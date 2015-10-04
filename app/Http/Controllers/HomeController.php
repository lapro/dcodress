<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Post;

class HomeController extends Controller
{
    //

    public function index(){

    	if(!Auth::check()){
    		
    		return view("home.guest");
    	
    	}else{

            $post = Post::where("user_id","=",Auth::user()->id)->take(4)->get();
    		return view("home/member")
            ->with("post",$post);
    	}
    }
}
