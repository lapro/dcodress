<?php

namespace App\Http\Controllers\Butik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Support\Str;

class DisplayController extends Controller
{
    //

    public function index($slug){

        $id = explode("-", $slug)[0];
    	$product = Product::find($id);

    	if(count($product) < 1 OR $product->status_pengajuan != 2){
    		//abort('404');
            return view("butik.display.notfound");
    	}

    	return view('butik.display.display')->with('product',$product)->with('slug',$slug);

    }

    public function random(Request $request){
    	$product = Product::where('status_pengajuan',2)->orderByRaw("RAND()")->first();
    	if($request->has("p")){
    		while($product->id == $request->get("p")){
    			$product = Product::where('status_pengajuan',2)->orderByRaw("RAND()")->first();
    		}
    	}
        if(count($product) < 1 ){
            //abort('404');
            return view("butik.display.notfound");
        }
    	return redirect("butik/".$product->id."-".Str::slug($product->name));
    }

}
