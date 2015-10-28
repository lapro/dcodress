<?php

namespace App\Http\Controllers\Moderator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Product;
use Auth;

class DeleteController extends Controller
{
    //

	public function delete($model, $id){

		if($model == 'product'){
			$m = Product::find($id);
		}elseif($model == "post"){
			$m = Post::find($id);
		}

		$m->delete();

		return redirect('/')->with('message',"$model berhasil di hapus");
	}

}
