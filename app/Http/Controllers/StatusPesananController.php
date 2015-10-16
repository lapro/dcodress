<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Invoice;

class StatusPesananController extends Controller
{
    //

    public function index(Request $request){

    	$email = $request->get("email");
    	$kode = $request->get("kode");

    	$invoice  = Invoice::where('email','=',$email)->where("kode",'=',$kode)->first();

    	return view("cek-pesanan")->with("invoice",$invoice);
    }
}
