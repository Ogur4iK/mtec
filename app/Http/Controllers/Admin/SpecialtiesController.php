<?php

namespace App\Http\Controllers\Admin;

use App\Speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $this->validate($request, [
            'code' =>'required',
            'qualification' => 'required',
            'img' => 'required',
            'name'   =>  'required'
        ]);

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
        $this->validate($request, [
            'code' =>'required',
            'qualification' => 'required',
            'name'   =>  'required'
        ]);
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
