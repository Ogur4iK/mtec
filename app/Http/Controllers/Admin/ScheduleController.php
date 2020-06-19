<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedules.index');
    }

    public function storeStudents(Request $request)
    {
        $messages = [
            'students.required' => 'Необходимо выбрать загружаемый файл',
            'students.mimes' => 'Файл должен быть формата: pdf'
        ];

        Validator::make($request->all(), [
            'students' =>'required|mimes:pdf'
        ], $messages)->validate();

        $this->uploadFile($request->file('students'), 'students_schedule');
        return redirect()->route('schedule.index')->with('status', 'Расписание для студентов успешно загружено');
    }

    public function storeTeachers(Request $request)
    {
        $messages = [
            'teachers.required' => 'Необходимо выбрать загружаемый файл',
            'teachers.mimes' => 'Файл должен быть формата: pdf'
        ];

        Validator::make($request->all(), [
            'teachers' =>'required|mimes:pdf'
        ], $messages)->validate();

        $this->uploadFile($request->file('teachers'), 'teachers_schedule');
        return redirect()->route('schedule.index')->with('status', 'Расписание для преподавателей успешно загружено');
    }

    public function uploadFile($file, $filename)
    {
        if($file == null)
        {
            return redirect()->route('schedule.index')->withErrors(array('message' => 'Выберите файл для загрузки'));
        }
        Storage::delete('uploads/schedules/' . $file);
        $file->storeAs('uploads/schedules', $filename . '.' .$file->extension());
    }
}
