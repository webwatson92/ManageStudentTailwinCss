<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentParent;

class StudentParentController extends Controller
{
    public function index(){
        return view('front.parents.index');
    }

    public function create(){
        return view('front.parents.creer-compte-parent');
    }

    public function edit($id){
        $parent = StudentParent::find($id);
        return view('front.parents.edition-compte-parent', compact('parent'));
    }
}
