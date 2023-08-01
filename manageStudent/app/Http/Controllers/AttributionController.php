<?php

namespace App\Http\Controllers;

use App\Models\Attribution;
use Illuminate\Http\Request;

class AttributionController extends Controller
{
    public function index(){
        return view('front.attributions.index');
    }

    public function create(){
        return view('front.attributions.entrer-eleve-en-classe');
    }

    public function edit($id){
        $attribution = Attribution::find($id);
        return view('front.attributions.modif-entrer-eleve-en-classe', compact('attribution'));
    }
}
