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
        $isUploaded = Gallery::uploadImages($request->file('images'));
        if ($isUploaded){
            return redirect()->route('gallery.index')->with('status', 'Изображения успешно добавлены');
        }
        else{
            return redirect()->route('gallery.create')->withErrors(array('message' => 'Выберите изображения для загрузки'));
        }
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
