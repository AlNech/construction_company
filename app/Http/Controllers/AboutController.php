<?php


namespace App\Http\Controllers;

use App\Models\News;

class AboutController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', News::PUBLISHED)->orderBy('publish_date', 'desc')->paginate(6);

        return view('about', compact('news'));
    }

    public function show($slug)
    {
        $newsItem = News::where('slug', $slug)->firstOrFail();
        return view('news_item', compact('newsItem'));
    }
}
