<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        return view('front.paiements.index');
    }

    public function create(){
        return view('front.paiements.faire-paiement');
    }

    public function edit($id){
        $payment = Payment::find($id);
        return view('front.paiements.modifer-paiement', compact('payment'));
    }
}
