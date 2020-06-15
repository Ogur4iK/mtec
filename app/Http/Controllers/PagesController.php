<?php

namespace App\Http\Controllers;

use App\News;
use App\Resource;
use App\Speciality;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $news = News::orderBy('created_at', 'desc')->take(8)->get();
        $specialties = Speciality::all();
        $resources = Resource::all();
        return view('pages.index', [
            'news' => $news,
            'specialties' => $specialties,
            'resources' => $resources
        ]);
    }

    public function about(){
        return view('pages.about');
    }

    public function news(){
        return view('pages.news');
    }

    public function abitur(){
        return view('pages.abitur');
    }

    public function spec(){
        return view('pages.spec');
    }

    public function learning(){
        return view('pages.learning');
    }

    public function contacts(){
        return view('pages.contacts');
    }
}
