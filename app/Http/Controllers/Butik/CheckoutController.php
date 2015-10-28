<?php

namespace App\Http\Controllers\Butik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Invoice;
use Cart;

class CheckoutController extends Controller
{
    //
    public function getPengiriman(){
    	
    	return view('butik.checkout.shipping');
    }

    public function postPengiriman(Request $request){

    	$data['name'] = $request->get('name');
		$data['email'] = $request->get('email');
		$data['handphone'] = $request->get('handphone');
		$data['province_id'] = $request->get('province_id');
		$data['province'] = $request->get('province');
		$data['city'] = $request->get('city');
		$data['city_id'] = $request->get('city_id');
		$data['address'] = $request->get('address');

		Session::put('invoice',$data);

		return redirect(url("butik/checkout/konfirmasi"));
    }

    public function getKonfirmasi(){

    	return view("butik.checkout.konfirmasi");
    
    }

    public function getSimpan(){

    	$invoice_kode = Invoice::createInvoice(Session::get('invoice'),Session::get('ongkir'));
        
        //echo Session::get('ongkir')."<br>";

    	if($invoice_kode != false){
			Session::forget('invoice');
			Cart::destroy();
			Session::forget('ongkir');
			return redirect(url('butik/payment/'.$invoice_kode));
		}
    }

}
