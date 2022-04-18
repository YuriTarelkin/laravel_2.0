<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ScourceController as AdminScourceController;
use App\Http\Controllers\Account\IndexController as AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Routes


Route::get('/categories', [CategoriesController::class, 'index'])
	->name('categories');
Route::get('/categories/{id}', [NewsController::class, 'index'])
	->where('id', '\d+')
	->name('category.show'); 

Route::get('/news', [NewsController::class, 'index'])
	->name('news');
Route::get('/news/getInfo', [NewsController::class, 'getInfo'])
	->name('news.getInfo');	
Route::post('/news/store', [NewsController::class, 'store'])
 	->name('news.store');	
Route::get('/news/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('news.show');

Route::group(['middleware' => 'auth'], function() {

	Route::group(['prefix' => 'account', 'as' => 'account.'], function() {
		Route::get('/', AccountController::class)
			->name('index');
		//logout
		Route::get('logout', function () {
			Auth::logout();
			return redirect()->route('login');
		})->name('logout');
	});
	


	//Admin routes
	Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.check'], function() {
		Route::get('/', AdminController::class)
			->name('index');
		Route::resource('categories', AdminCategoryController::class);
		Route::resource('news', AdminNewsController::class);
		Route::resource('users', AdminUserController::class);
		Route::resource('scources', AdminScourceController::class);
	});
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


