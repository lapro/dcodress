<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Cart;
use App\Model\Product;
use Session;
use App\Model\Configuration;

class CartController extends Controller
{
    //

    public function getAdd($slug, Product $product){

    	$row = $product->getDataBySlug($slug);

    	if($row->count() > 0 AND !$this->cekSudahAdd($row->id)){

    		Cart::add($row->id, $row->name, 1, $row->price,array('weight'=>$row->weight));
    	}

    	return redirect(url('cart'));
    }

    private function cekSudahAdd($id){
    	
    	foreach (Cart::content() as $key => $value) {
    		if($value->id == $id){
    			return true;
    		}
    	}

    	return false;
    }

    public function getRemove($rowId){
    	Cart::remove($rowId);
    	//return redirect(url('cart'));
    }

    public function getDestroy(){
    	Cart::destroy();
    	//return redirect(url('cart'));
    }

    public function postUpdate(Request $request){
		$quantity =  $request->get('qantity');
		$rowId = $request->get('rowId');

		for($i = 0;$i<count($rowId);$i++){

			Cart::update($rowId[$i], array('qty'=>$quantity[$i]));
		}

		return redirect(url('cart'));
    }

    public function getIndex(){

    	return view('cart.index');
    }

    public function getBasket(){
        return view('cart.basket');
    }


}
