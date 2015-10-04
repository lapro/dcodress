<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Category;
use Auth;

class PostsController extends Controller
{
    //

    public function __contruct(){

         $this->middleware('auth');
    }

    public function getIndex($kode){

        
        $post = Post::where("kode","=",$kode)->first();
        $cat = Category::lists("name","id");
        //menampilkan
        return view("member.post")->with("post",$post)->with("cat",$cat);
        
        
        
    }

    public function postIndex($kode, Request $request){
        $post = Post::where("kode","=",$kode)->first();
        $post->description = $request->get('description');
        $post->categories()->attach([$request->get('category')]);
        $post->save();

        return redirect("/");
    }

    public function postUpload(Request $request, Post $post){

    	$photo = $request->file('file');
    	$kode = $post->makeKode();
    	$filename = $kode.".jpg";

    	if($post->uploadImage($photo, $filename)){
    		
    		$post->image = $filename;
    		$post->kode = $kode;
            $post->user_id = Auth::user()->id;
    		$post->save();
            $post->saveColors();

    		return redirect(url("post/".$kode));
    	}
    }

    
}
