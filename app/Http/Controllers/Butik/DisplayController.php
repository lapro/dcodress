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

    	return view('butik.display.display')->with('product',$product);

    }

    public function random(Request $request){
    	$product = Product::orderByRaw("RAND()")->first();
    	if($request->has("p")){
    		while($product->slug == $request->get("p")){
    			$product = Product::orderByRaw("RAND()")->first();
    		}
    	}
    	return redirect("butik/".$product->slug);
    }

}
