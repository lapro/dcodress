<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Invoice;
use Datatables;
use Carbon\Carbon;

class InvoicesController extends Controller
{
    //

    public function getIndex(){

    	return view('backoffice.invoice.index');

    }

    public function getDatatables(Request $request){
        
        $datas = Invoice::select([
                'id',
                'kode',
                'name',
                'total',
                'status',
            ]);
        $no = $request->get('start')+1;

       $datatables = Datatables::of($datas)
            ->addColumn('action', function ($data) {
                    return '
                    <a href="'.url("backoffice/invoices/$data->id").'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye"></i> Detail</a>
                       '.$this->aksi($data->status, $data->id).'
                       <a href="'.url("backoffice/invoices/$data->id").'" data-method = "DELETE" data-confirm="yakin untuk menghapus?" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-close"></i> Batal</a>
                    ';
                })
            ->addColumn('no', function ($data)use (&$no){
                    return $no++;
                })
            ->removeColumn('id');
            
        if ($status = $datatables->request->get('status')) {
            if($status!='all'){
                $datatables->where('status','=',$status);
            }
         }
        
         
        
        return $datatables->make(true);
    }


    private function aksi($status, $id){

    	if($status == "Menunggu Verifikasi"){
    		$url = url("backoffice/invoices/verification/$id");
    		$aksi = "Verifikasi";
    		return '<a href="'.$url.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '.$aksi.'</a>';
    	}
    	else{

    		return "";
    	}
   	}

    public function getDetail($id){
        $invoice = Invoice::find($id);
        return view("backoffice/invoice/detail")->with("invoice",$invoice);
    }

    public function getVerification($id){
        return view("backoffice/invoice/verification")->with('id',$id);
    }

    public function postVerification($id, Request $request){
        $invoice = Invoice::where('id','=',$id)->update([
            'status'=>3,
            'note'=>$request->get('note'),
            'verification_date'=>Carbon::now(),
            ]);

        return redirect('backoffice/invoices')->with('message',["body"=>"Invoice Berhasil disimpan","status"=>"success"]);
    }



}