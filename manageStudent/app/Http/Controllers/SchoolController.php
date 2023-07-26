<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(){
        return view('front.settings.liste');
    }

    public function create(){
        return view('front.settings.creer-annee-scolaire');
    }
}
