<?php

namespace App\Http\Controllers;

use App\Speciality;
use Illuminate\Http\Request;

class SpecialtiesController extends Controller
{
    public function show($slug)
    {
        $speciality = Speciality::where('slug', $slug)->firstOrFail();
        return view('pages.speciality', ['speciality' => $speciality]);
    }
}
