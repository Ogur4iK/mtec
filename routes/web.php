<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'NewsController@index');
    Route::resource('/news', 'NewsController');
    Route::resource('/users', 'UsersController')->middleware('admin');
    Route::resource('/specialties', 'SpecialtiesController');
    Route::resource('/resources', 'ResourcesController');
    Route::resource('/history', 'HistoryController');
    Route::resource('/gallery', 'GalleryController');
    Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');
    Route::post('/schedule/students', 'ScheduleController@storeStudents')->name('schedule.storeStudents');
    Route::post('/schedule/teachers', 'ScheduleController@storeTeachers')->name('schedule.storeTeachers');
    Route::resource('/speciality-description', 'SpecialtiesDescriptionController');
    Route::get('/speciality-description/{parent_id}/create/',
        'SpecialtiesDescriptionController@create')->name('speciality-description.create');
    Route::resource('/menu', 'MenuController');
});

Route::get('/logout', 'AuthController@logout')->name('logout');
Route::middleware('guest')->group(function () {
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login')->name('login');
});

Route::get('/', 'PagesController@home');

Route::get('/news/{slug}', 'NewsController@show');
Route::get('/news', 'NewsController@index');

Route::get('/specialties/{slug}', 'SpecialtiesController@show');

Route::get('/history', function (){
    return view('pages.history', ['history' => App\History::all()]);
});

Route::get('/about', function (){
    return view('pages.about', ['gallery' => App\Gallery::all()]);
});

Route::get('/abituriyentu', function (){
   return view('pages.abitur', ['specialties' => App\Speciality::all()]);
});

Route::get('/contacts', function (){
    return view('pages.contacts');
});

Route::get('/uchashchimsya', function (){
    $studentsScheduleExists = Storage::exists('uploads/schedules/students_schedule.pdf');
    $teachersScheduleExists = Storage::exists('uploads/schedules/teachers_schedule.pdf');
    return view('pages.uchashchimsya', [
        'studentsScheduleExists' => $studentsScheduleExists,
        'teachersScheduleExists' => $teachersScheduleExists
    ]);
});

