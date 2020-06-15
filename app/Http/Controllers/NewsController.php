<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news_item = News::where('slug', $slug)->firstOrFail();
        $news_item->viewsInc();
        return view('pages.news_page', ['news_item' => $news_item]);
    }

    public function index()
    {
        $news = News::paginate(10);
        return view('pages.news', ['news' => $news]);
    }
}
