<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedules.index');
    }

    public function storeStudents(Request $request)
    {
        $this->validate($request, [
            'students' =>'required|mimetypes:application/pdf'
        ]);
        $this->uploadImage($request->file('students'), 'students_schedule');
        return redirect()->route('schedule.index')->with('status', 'Расписание для студентов успешно загружено');
    }

    public function storeTeachers(Request $request)
    {
        $this->validate($request, [
            'teachers' =>'required|mimetypes:application/pdf'
        ]);
        $this->uploadImage($request->file('teachers'), 'teachers_schedule');
        return redirect()->route('schedule.index')->with('status', 'Расписание для преподавателей успешно загружено');
    }

    public function uploadImage($file, $filename)
    {
        if($file == null)
        {
            return redirect()->route('schedule.index')->withErrors(array('message' => 'Выберите файл для загрузки'));
        }
        Storage::delete('uploads/schedules/' . $file);
        $file->storeAs('uploads/schedules', $filename . '.' .$file->extension());
    }
}
