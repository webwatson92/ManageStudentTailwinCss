<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index(){
        return view('front.classes.index');
    }

    public function create(){
        return view('front.classes.creer-classe');
    }

    public function edit($id){
        $classe = Classe::find($id);
        return view('front.classes.edition-classe', compact('classe'));
    }
}
