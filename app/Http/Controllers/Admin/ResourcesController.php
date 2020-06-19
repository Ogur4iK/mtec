<?php

namespace App\Http\Controllers\Admin;

use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();
        return view('admin.resources.index', ['resources' => $resources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resources.create');
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
            'url.required' => 'Ссылка является обязательным полем',
            'img.required' => 'Изображение является обязательным полем',
            'img.image' => 'Изображение должно быть формата: jpeg, png, jpg, gif, svg, bmp'
        ];
        Validator::make($request->all(), [
            'title' =>'required',
            'url'   =>  'required',
            'img' =>  'required|image'
        ], $messages)->validate();

        $resource = Resource::add($request->all());
        $resource->uploadImage($request->file('img'));
        return redirect()->route('resources.index')->with('status', 'Запись успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource = Resource::find($id);
        return view('admin.resources.edit', ['resource' => $resource]);
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
            'url.required' => 'Ссылка является обязательным полем',
            'img.image' => 'Изображение должно быть формата: jpeg, png, jpg, gif, svg, bmp'
        ];
        Validator::make($request->all(), [
            'title' =>'required',
            'url'   =>  'required',
            'img' =>  'nullable|image'
        ], $messages)->validate();

        $resource = Resource::find($id);
        $resource->edit($request->all());
        $resource->uploadImage($request->file('img'));
        return redirect()->route('resources.index')->with('status', 'Запись успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resource::find($id)->remove();
        return redirect()->route('resources.index')->with('status', 'Запись успешно удалена');
    }
}
