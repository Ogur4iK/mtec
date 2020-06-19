<?php

namespace App\Http\Controllers\Admin;

use App\Speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = Speciality::all();
        return view('admin.specialties.index', ['specialties' => $specialties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialties.create');
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
            'code.required' => 'Код специальности является обязательным полем',
            'qualification.required' => 'Квалификация является обязательным полем',
            'name.required' => 'Наименование специальности является обязательным полем',
            'img.required' => 'Изображение на главной является обязательным полем',
            'img.image' => 'Изображение на главной должно быть формата: jpeg, png, jpg, gif, svg, bmp',
            'img_bg.image' => 'Изображения в шапке должно быть формата: jpeg, png, jpg, gif, svg, bmp'
        ];
        Validator::make($request->all(), [
            'code' =>'required',
            'qualification' => 'required',
            'img' => 'required|image',
            'img_bg' => 'image',
            'name'   =>  'required'
        ], $messages)->validate();

        $speciality = Speciality::add($request->all());
        $speciality->toggleReception($request->get('is_reception'));
        $speciality->uploadImage($request->file('img'));
        $speciality->uploadBgImage($request->file('img_bg'));
        return redirect()->route('specialties.index')->with('status', 'Запись успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speciality = Speciality::find($id);
        return view('admin.specialties.edit', ['speciality' => $speciality]);
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
            'code.required' => 'Код специальности является обязательным полем',
            'qualification.required' => 'Квалификация является обязательным полем',
            'name.required' => 'Наименование специальности является обязательным полем',
            'img.image' => 'Изображение на главной должно быть формата: jpeg, png, jpg, gif, svg, bmp',
            'img_bg.image' => 'Изображения в шапке должно быть формата: jpeg, png, jpg, gif, svg, bmp'
        ];
        Validator::make($request->all(), [
            'code' =>'required',
            'qualification' => 'required',
            'img' => 'image',
            'img_bg' => 'image',
            'name'   =>  'required'
        ], $messages)->validate();

        $speciality = Speciality::find($id);
        $speciality->edit($request->all());
        $speciality->toggleReception($request->get('is_reception'));
        $speciality->uploadImage($request->file('img'));
        $speciality->uploadBgImage($request->file('img_bg'));
        return redirect()->route('specialties.index')->with('status', 'Запись успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Speciality::find($id)->remove();
        return redirect()->route('specialties.index')->with('status', 'Запись успешно удалена');
    }
}
