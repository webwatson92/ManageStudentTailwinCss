<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index(){
        return view('front.niveaux.index');
    }

    public function create(){
        return view('front.niveaux.creer-niveau-scolaire');
    }

    public function edit(Niveau $niveau){
        return view('front.niveaux.edition-niveau-scolaire', compact('niveau'));
    }
}
