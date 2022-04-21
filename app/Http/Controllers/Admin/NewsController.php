<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Scource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\UploadService;

class NewsController extends Controller
{
    public function index()
    {
		return view('admin.news.index', [
			'newsList' => News::with('category', 'scource')->paginate(5)
		]);
    }

    public function create()
    {
		return view('admin.news.create', [
			'categories' => Category::select("id", "title")->get(),
			'scources' => Scource::select("id", "name")->get()
		]);
    }

    public function store(CreateRequest $request, News $news)
    {
		$news = News::create($request->validated());
		if($news) {
			return redirect()->route('admin.news.index')
				->with('success', __('messages.admin.news.create.success'));
		}

		return back()->with('error', __('messages.admin.news.create.fail'));
    }

    public function show($id)
    {
        //
    }

    public function edit(News $news)
    {
		return view('admin.news.edit', [
			'news' => $news,
			'categories' => Category::select("id", "title")->get()
		]);
    }

	public function update(EditRequest $request, News $news)
    {
		$validated = $request->validated();
		if($request->hasFile('image')) {
			$service = app(UploadService::class);
			$validated['image'] = $service->uploadFile($request->file('image'));
		}

		$status = $news->fill($validated)->save();

		if ($status) {
			return redirect()->route('admin.news.index')
				   ->with('success', __('messages.admin.news.update.success'));
		}
		return back()->with('error', __('messages.admin.news.update.fail'));
    }

	public function destroy(News $news): JsonResponse
    {
        try{
			 $news->delete();

			 return response()->json(['status' => 'ok']);
		}catch (\Exception $e) {
			\Log::error("News wasn't delete");
			return response()->json(['status' => 'error'], 400);
		}
    }
}