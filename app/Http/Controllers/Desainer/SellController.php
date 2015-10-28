<?php

namespace App\Http\Controllers\Desainer;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Post;
use Illuminate\Support\Str;
use Auth;

class SellController extends Controller
{
    //

    public function getIndex(Request $request){

        if(!Auth::user()->hasRole('Desainer')){
            return view('desainer.not-desainer');
        }

    	$post = NULL;

    	if($request->has('pid')){
    		$post = Post::find($request->get('pid'));
    	}

        $tags = Post::existingTags()->pluck('name');

    	return view('desainer.sell')->with('tags', $tags)->with("post",$post);
    }

    public function postIndex(Request $request){
        

        $user_id = Auth::user()->id;

        $product = new Product;

        if($request->hasFile('file')){

        	$slug = Str::slug($request->get('name'));
        	$photo = $request->file('file');

	        $filename = $slug.".".$photo->guessExtension();
	        $location = "products/".$user_id."/";


	        $thumbfilename = $slug.".".$photo->guessExtension();
	        $thumblocation = "products-thumbnail/".$user_id."/";
	        
	        if(Product::uploadImage($photo, $location, $filename) AND Product::uploadImageThumb($photo, $thumblocation, $thumbfilename)){
	            
	          	
	          	$product->image = $location.$filename;
        		$product->thumb = $thumblocation.$thumbfilename;
	        }
	    }else{

	    	$product->image = $request->get('image');
        	$product->thumb = $request->get('thumb');
	    }

	    $product->description = $request->get('description');
        $product->name = $request->get('name');
        $product->weight = $request->get('weight');
		$product->original_price = $request->get('original_price');
		$product->status_pengajuan = 1;

        $product->user_id = $user_id;
        $product->save();
        
        if(count($request->get('cara_promo'))>0){
        	foreach ($request->get('cara_promo') as $key => $value) {
        		
        		$product->caraPromo()->attach($value);
        	}
        }

        if($request->get('tags')!=""){
                $post->tag(explode(',', $request->get('tags')));
            }
    }

    public function getComplete(){

    	return view('desainer.sell-complete');
    }
}
