<?php

namespace App\Http\Controllers\Butik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Invoice;
use App\Model\Configuration;
use App\Model\OurBankAccount;
use App\Model\InvoicePaymentByTransfer;
use Carbon\Carbon;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($kodeInvoice, Configuration $configuration)
    {
        //
        $invoice = Invoice::where('kode','=',$kodeInvoice)->first();
        $oba = OurBankAccount::all();
        return view("butik.payment.index")
                ->with("invoice",$invoice)
                ->with("configuration", $configuration)
                ->with("oba",$oba);
    }

    public function getKonfirmasi(Request $request){
        $email = $request->get("email");
        $kode = $request->get("kode");

        $invoice  = Invoice::where('email','=',$email)->where("kode",'=',$kode)->first();
        $oba = OurBankAccount::all();
        return view("butik.payment.konfirmasi")
        ->with('invoice',$invoice)
        ->with("oba",$oba);
    }

    public function postKonfirmasi( Request $request){
        $email = $request->get("email");
        $kode = $request->get("kode");

        $invoice  = Invoice::where('email','=',$email)->where("kode",'=',$kode)->first();
        $to = OurBankAccount::find($request->get("to"));

        if(!empty($invoice)){
            DB::beginTransaction();
            try{
            $invoice->status = 2;
            $invoice->confirmation_date = Carbon::now();
            $invoice->payment_method = 2;
            $invoice->save();
            InvoicePaymentByTransfer::create([
                "invoice_id" => $invoice->id,
                "trans_amount" =>$request->get("trans_amount"),
                "trans_date"=>$request->get("trans_date"),
                "from_bank_name" => $request->get("from_bank_name"),
                "from_account_name"=>$request->get("from_account_name"),
                "from_rekening_number" => $request->get("from_rekening_number"),
                "to_bank_name" => $to->bank_name,
                "to_account_name"=>$to->account_name,
                "to_rekening_number" => $to->rekening_number,
                ]);

            DB::commit();
            return redirect(url("cek-pesanan")."?email=$invoice->email&kode=$invoice->kode");
            
            }catch(\Exception $e){
                DB::rollback();
                throw ($e);
            }
        }
        else{
            return "email dan kode tidak ditemukan";
        }

    }
    
}
