<?php

namespace App\Http\Controllers\Admin;

use App\Speciality;
use App\SpecialityDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialtiesDescriptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent_id)
    {
        $parent_name = Speciality::find($parent_id)->name;
        return view('admin.specialties.description.create', ['parent_id' => $parent_id, 'parent_name' => $parent_name]);
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
            'form' => 'required',
            'period' => 'required',
            'short_period' => 'required',
            'tests' => 'required',
            'education' => 'required',
            'plan' => 'required',
            'speciality_id' => 'required'
        ]);

        SpecialityDescription::add($request->all());
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
        $speciality_desc = SpecialityDescription::find($id);
        $parent_name = Speciality::find($speciality_desc->speciality_id)->name;
        return view('admin.specialties.description.edit', ['speciality_desc' => $speciality_desc, 'parent_name' => $parent_name]);
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
            'form' => 'required',
            'period' => 'required',
            'short_period' => 'required',
            'tests' => 'required',
            'education' => 'required',
            'plan' => 'required'
        ]);

        $speciality_desc = SpecialityDescription::find($id);
        $speciality_desc->edit($request->all());
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
        SpecialityDescription::find($id)->delete();
        return redirect()->route('specialties.index')->with('status', 'Запись успешно удалена');
    }
}
