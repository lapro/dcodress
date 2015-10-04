<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Invoice;
use Datatables;
use Carbon\Carbon;

class InvoiceController extends Controller
{   

    public $no;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        $verifikasi = Invoice::where('status','=',2)->count();
        return view('adm.invoice.index')->with('verifikasi',$verifikasi);

    }

    public function getDatatables( Request $request){
         $datas = Invoice::select([
                'id',
                'kode',
                'status',
                'payment_method',
                'total',
            ]);
         
        $this->no = $request->get('start')+1;
       $datatables=  Datatables::of($datas)
            ->addColumn('action', function ($data) {
                    $return = "";

                    $btn = $this->makeBtn($data);
                   // $btnDelete = ' <a href="'.url("adm/products/$data->id").'" data-method = "DELETE" data-confirm="yakin untuk menghapus?" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                    $return = $btn;
                    return $return;
                })
            ->addColumn('rownum', function ($data){
                    return $this->no++;
                })
            ->removeColumn('id');
        
         if ($status = $datatables->request->get('status')) {
            if($status!='all'){
                $datatables->where('status','=',$status);
            }
         }
        
        return $datatables->make(true);
    }

    private function makeBtn($data){
        switch ($data->status) {
            case 'Menunggu Verifikasi':
                return '
                <a href="'.url("adm/invoices/verification/$data->id").'" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> verifikasi</a>
                ';
                break;
            
            default:
                return "";
                break;
        }
    }

    public function getVerification($id){
        $invoice = Invoice::find($id);
        return view("adm/invoice/verification")->with('invoice',$invoice);
    }

    public function postVerification($id, Request $request){
        $invoice = Invoice::where('id','=',$id)->update([
            'status'=>3,
            'note'=>$request->get('note'),
            'verification_date'=>Carbon::now(),
            ]);

        return redirect(url('adm/invoices'))->with('message',["body"=>"Invoice Berhasil disimpan","status"=>"success"]);
    }
}
