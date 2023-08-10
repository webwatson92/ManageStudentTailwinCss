<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FraisScolarite;

class FraisScolariteController extends Controller
{
    public function index(){
        return view('front.scolarites.index');
    }

    public function create(){
        return view('front.scolarites.creer-frais');
    }

    public function edit(FraisScolarite $frais){
        return view('front.scolarites.edition', compact('frais'));
    }
}
