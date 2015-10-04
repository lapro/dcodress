<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Post;

class DetailController extends Controller
{
    //

    public function getIndex($kode){

    	$post = Post::where("kode","=",$kode)->first();
        //menampilkan
        return view("member.detail")->with("post",$post);
    }
}
