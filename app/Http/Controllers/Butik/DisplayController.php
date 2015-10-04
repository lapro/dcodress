<?php

namespace App\Http\Controllers\Butik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Product;

class DisplayController extends Controller
{
    //

    public function index($slug){

    	$product = Product::where('slug','=',$slug)->first();

    	if(count($product) < 1 ){
    		abort('404');
    	}

    	return view('butik.display')->with('product',$product);

    }
}
