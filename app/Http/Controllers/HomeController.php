<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Post;
use App\Model\Product;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    //

    public function index(){

    	if(!Auth::check()){
    		
    		return view("home.home");
    	
    	}else{

            //$post = Post::where("user_id","=",Auth::user()->id)->take(4)->get();
    		return view("home/home");
    	}
    }

    public function grid($grid, Str $str){

        $post = array();

        if($grid == "terbaru"){
            $post = Post::OrderBy("created_at","desc")->take(8)->get();
            $do="local";

        }elseif($grid == "instagram"){
        
        //#OOTD
        $response=$this->getHttpClient()->get("https://api.instagram.com/v1/tags/ootdindo/media/recent?client_id=922f228491dd40d9a5c540927ae8101a")->getBody();
        $decode = json_decode((string)$response);

            $post = $decode->data;
            //print_r($post);
            $do="instagram";

        }elseif($grid == "butik"){

            $post = Product::OrderBy("created_at","desc")->where('status_pengajuan',"=",2)->take(8)->get();
            $do="butik";

        }

        return view("home.grid")->with("post",$post)->with("do",$do)->with('str',$str);
    }

    protected function getHttpClient()
    {   
        $handler = new \GuzzleHttp\Handler\CurlHandler();
        $stack = HandlerStack::create($handler); // Wrap w/ middleware
        return new \GuzzleHttp\Client(['handler' => $stack]);
    }


}
