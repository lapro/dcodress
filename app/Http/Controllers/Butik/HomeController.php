<?php

namespace App\Http\Controllers\Butik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //

    public function index(){
    	return view("butik.home");
    }
}
