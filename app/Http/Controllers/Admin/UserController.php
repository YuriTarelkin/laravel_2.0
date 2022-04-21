<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = app(User::class);

        return view('admin.users.index', [
			'users' => User::all()
		]);
    }

    
    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
