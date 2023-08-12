<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function index(){
        return view('front.eleves.index');
    }

    public function create(){
        return view('front.eleves.creer-compte-eleve');
    }

    public function show($id){
        $eleve = Eleve::find($id);
        return view('front.eleves.show-compte-eleve', compact('eleve'));
    }

    public function edit($id){
        $eleve = Eleve::find($id);
        return view('front.eleves.edition-compte-eleve', compact('eleve'));
    }
}
