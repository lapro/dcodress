<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    //

    public function all(Request $request){
    	//ajax call...

    	if($request->ajax()){
    		$all = Category::all();

    		if($request->get('type') == "form"){
    			$r = '';
    			foreach($all as $val){
    				$r .= "<option value='$val->id'>$val->name</option>";
    			}

    			return $r;
    		}

    		return $all;
    	}
    }
}
