<?php

namespace App\Http\Controllers\Admin;

use App\Speciality;
use App\SpecialityDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $messages = [
            'education.required' => 'Образование является обязательным полем',
            'form.required' => 'Фрорма обучения является обязательным полем',
            'period.required' => 'Срок обучения является обязательным полем',
            'short_period.required' => 'Срок обучения в сокращенном виде является обязательным полем',
            'tests.required' => 'Вступительные испытания является обязательным полем',
            'plan.required' => 'План приема является обязательным полем',
            'speciality_id.required' => 'Пароль является обязательным полем'
        ];
        Validator::make($request->all(), [
            'education' => 'required',
            'form' => 'required',
            'period' => 'required',
            'short_period' => 'required',
            'tests' => 'required',
            'plan' => 'required',
            'speciality_id' => 'required'
        ], $messages)->validate();

        SpecialityDescription::add($request->all());
        return redirect()->route('specialties.index')->with('status', 'Запись успешно добавлена');
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
        return view('admin.specialties.description.edit',
            ['speciality_desc' => $speciality_desc, 'parent_name' => $parent_name]);
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
            'education.required' => 'Образование является обязательным полем',
            'form.required' => 'Фрорма обучения является обязательным полем',
            'period.required' => 'Срок обучения является обязательным полем',
            'short_period.required' => 'Срок обучения в сокращенном виде является обязательным полем',
            'tests.required' => 'Вступительные испытания является обязательным полем',
            'plan.required' => 'План приема является обязательным полем',
            'speciality_id.required' => 'Пароль является обязательным полем'
        ];
        Validator::make($request->all(), [
            'education' => 'required',
            'form' => 'required',
            'period' => 'required',
            'short_period' => 'required',
            'tests' => 'required',
            'plan' => 'required'
        ], $messages)->validate();

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
