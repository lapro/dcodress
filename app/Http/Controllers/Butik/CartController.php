<?php

namespace App\Http\Controllers\Butik;

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

    	if($row->count() > 0 and $row->stok > 0){

    		Cart::add($row->id, $row->name, 1, $row->price,array('detail'=>$row));
    	    return "true";
        }

        return "false";

    	//return redirect(url('butik/cart'));
    }

    public function getUpdate($rowId, $val){

         Cart::update($rowId, $val);

         return "true";
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

    public function getCount(){
        return Cart::count();
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

    	return view('butik.cart.index');
    }

    public function getBasket(){
        return view('butik.cart.basket');
    }
}
