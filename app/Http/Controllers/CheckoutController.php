<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Invoice;
use Cart;
use App\Model\Configuration;
use App\Model\OurBankAccount;
use App\Model\InvoicePaymentByTransfer;
use DB;
use Carbon;

class CheckoutController extends Controller
{
    //

    

	public function getUser(){

		return view('checkout.user');

	} 

	public function postUser(Request $request){
		$data['u_name'] = $request->get('u_name');
		$data['u_email'] = $request->get('u_email');
		$data['u_handphone'] = $request->get('u_handphone');

		Session::put('invoice.user',$data);

		return redirect(url('checkout/destination'));
	}

	public function getDestination(){
		//print_r(Session::get('invoice'));
		return view('checkout.destination');
	}

	public function postDestination(Request $request){

		$data['province_id'] = $request->get('province_id');
		$data['province'] = $request->get('province');
		$data['city'] = $request->get('city');
		$data['city_id'] = $request->get('city_id');
		$data['address'] = $request->get('address');

		Session::put('invoice.destination',$data);

		// Simpan invoice transaksi :

		//$invoice = Invoice::create([]);

		$invoice_kode = Invoice::createInvoice(Session::get('invoice'),Session::get('ongkir'));

		if($invoice_kode != false){
			Session::forget('invoice');
			Cart::destroy();
			Session::forget('ongkir');
			return redirect(url('checkout/payment/'.$invoice_kode));
		}
		
	}	


	public function getPayment($kodeInvoice, Configuration $configuration){
		$invoice = Invoice::where('kode','=',$kodeInvoice)->first();
		$oba = OurBankAccount::all();
		return view("checkout.payment")
				->with("invoice",$invoice)
				->with("configuration", $configuration)
				->with("oba",$oba);
	}

	public function getConfirmation($kodeInvoice){
		$oba = OurBankAccount::all();
		return view("checkout.confirmation")
		->with('kode',$kodeInvoice)
		->with("oba",$oba);
	}

	public function postConfirmation($kodeInvoice, InvoicePaymentByTransfer $ipbt, Request $request){
		$invoice = Invoice::where("kode","=",$kodeInvoice)->first();
		if(!empty($invoice) AND $invoice->status==1){
			DB::transaction(function()use($invoice,$request,$ipbt,$kodeInvoice){

				$to = OurBankAccount::find($request->get('to'));
				$ipbt->invoice_id = $invoice->id;
				$ipbt->from_bank_name = $request->get("from_bank_name");
				$ipbt->from_rekening_number = $request->get("from_rekening_number");
				$ipbt->from_account_name = $request->get("from_account_name");
				$ipbt->to_bank_name = $to->bank_name;
				$ipbt->to_rekening_number = $to->rekening_number;
				$ipbt->to_account_name = $to->account_name;
				$ipbt->trans_amount = $request->get("trans_amount");
				$ipbt->trans_date = $request->get("trans_date");
				$ipbt->save();

				Invoice::where("kode","=",$kodeInvoice)->update([
					'status'=>2,
					'payment_method'=>2,
					'confirmation_date'=>Carbon::now()
					]);
		
			});

			return redirect(url("checkout/status?kode=".$kodeInvoice."&email=".$invoice->email))->with("msg","Konfirmasi berhasi, harap tunggu verifikasi Admin maks <b> 1x24 jam </b>");
		
		}else{
			return view("checkout.confirmation_fail")
				->with('kode',$kodeInvoice);
		}
		
	}

	public function getStatus(Request $request){
		$kode = $request->get('kode');
		$email = $request->get('email');

		$invoice = Invoice::where("kode","=",$kode)->where('email','=',$email)->first();
		return view("checkout.status")->with("invoice",$invoice);
	}

}
