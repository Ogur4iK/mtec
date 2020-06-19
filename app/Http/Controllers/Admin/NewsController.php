<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'Заголовок является обязательным полем',
            'content.required' => 'Контент является обязательным полем',
            'description.required' => 'Описание является обязательным полем',
            'img.image' => 'Изображение должно быть формата: jpeg, png, jpg, gif, svg, bmp',
        ];
        Validator::make($request->all(), [
            'title' =>'required',
            'content'   =>  'required',
            'description' => 'required',
            'img' =>  'nullable|image'
        ], $messages)->validate();

        $news = News::add($request->all());
        $news->uploadImage($request->file('img'));
        return redirect()->route('news.index')->with('status', 'Запись успешно добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'title.required' => 'Заголовок является обязательным полем',
            'content.required' => 'Контент является обязательным полем',
            'description.required' => 'Описание является обязательным полем',
            'img.image' => 'Изображение должно быть формата: jpeg, png, jpg, gif, svg, bmp'
        ];
        Validator::make($request->all(), [
            'title' =>'required',
            'content'   =>  'required',
            'description' => 'required',
            'img' =>  'nullable|image'
        ], $messages)->validate();

        $news = News::find($id);
        $news->edit($request->all());
        $news->uploadImage($request->file('img'));
        return redirect()->route('news.index')->with('status', 'Запись успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->remove();
        return redirect()->route('news.index')->with('status', 'Запись успешно удалена');
    }
}
