<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
			'categories' => Category::withCount('news')->paginate(10)
		]);
    }

    public function create()
    {
		return view('admin.categories.create');
    }

    public function store(CreateRequest $request, Category $category)
    {
        $category = Category::create($request->validated());;
        if($category) {
			    return redirect()->route('admin.categories.index')
				    ->with('success', __('messages.admin.categories.create.success'));
		    }

		    return back()->with('error', __('messages.admin.categories.create.fail'));

    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
		  return view('admin.categories.edit', [
			  'category' => $category
	  	]);
    }

    public function update(EditRequest $request, Category $category)
    {
      $status = $category->fill($request->validated())->save();

      if($status) {
        return redirect()->route('admin.categories.index')
          ->with('success', __('messages.admin.categories.update.success'));
		  }
	  	return back()->with('error', __('messages.admin.categories.update.fail'));
    }

    public function destroy(Category $category): JsonResponse
    {
      try{
        $category->delete();
 
        return response()->json(['status' => 'ok']);
     }catch (\Exception $e) {
       \Log::error("Category wasn't delete");
       return response()->json(['status' => 'error'], 400);
     }
    }
}