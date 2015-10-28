<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatisController extends Controller
{
   public function getRules(){

        return view('statis.rules');
   }
}
