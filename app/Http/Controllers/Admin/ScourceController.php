<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Scources\CreateRequest;
use App\Http\Requests\Scources\EditRequest;

class ScourceController extends Controller
{
    public function index()
    {
        return view('admin.scources.index', [
			'scources' => Scource::withCount('news')->paginate(10)
		]);
    }

    public function create()
    {
		return view('admin.scources.create');
    }

    public function store(CreateRequest $request, Scource $scource)
    {
      $scource = Scource::create($request->validated());;
      if($scource) {
        return redirect()->route('admin.scources.index')
          ->with('success', __('messages.admin.scources.create.success'));
      }

      return back()->with('error', __('messages.admin.scources.create.fail'));

    }

    public function show($id)
    {
        //
    }

    public function edit(Scource $scource)
    {
		  return view('admin.scources.edit', [
			  'scource' => $scource
	  	]);
    }

    public function update(EditRequest $request, Scource $scource)
    {
      $status = $scource->fill($request->validated())->save();

      if($status) {
        return redirect()->route('admin.scources.index')
          ->with('success', __('messages.admin.scources.update.success'));
		  }
	  	return back()->with('error', __('messages.admin.scources.update.fail'));

    }

    public function destroy(Scource $scource): JsonResponse
    {
      try{
        $scource->delete();
 
        return response()->json(['status' => 'ok']);
     }catch (\Exception $e) {
       \Log::error("Scource wasn't delete");
       return response()->json(['status' => 'error'], 400);
     }
    }
}
