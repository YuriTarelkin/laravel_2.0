<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
	public function index()
    {
		return view('news.index', [
			'newsList' => News::with('category')->paginate(30)
		]);
    }

	public function store(Request $request)
    {
			return response()->json(
			$request->only('author', 'email', 'description'), 201
		  );
    }

	public function show(int $id)
	{
		return view('news.show', [
			'news' => News::find($id)
		]);
	}

	public function getInfo()
	{
		return view('news.getInfo');
	}

	
}
