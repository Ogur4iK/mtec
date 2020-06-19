<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gallery.index', ['gallery' => Gallery::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            'images.required' => 'Выберите изображения для загрузки',
            'images.*.image' => 'Изображения должны быть форматов: jpeg, png, jpg, gif, svg, bmp'
        ];
        Validator::make($request->all(), [
            'images' => 'required',
            'images.*' => 'image'
        ], $messages)->validate();
        Gallery::uploadImages($request->file('images'));
        return redirect()->route('gallery.index')->with('status', 'Изображения успешно добавлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::find($id)->remove();
        return redirect()->route('gallery.index')->with('status', 'Изображение успешно удалено');
    }
}
