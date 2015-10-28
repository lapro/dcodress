<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Auth;
use DB;

use Datatables;

class PengajuanProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('backoffice.pengajuan.index');
    }

    public function datatables(Request $request){
         $datas = Product::select([
                'id',
                'name',
                'created_at',
                'thumb'
            ]);
        $no = $request->get('start')+1;

       return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                    return '
                    <a href="'.url("backoffice/pengajuan/$data->id").'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> lihat</a>
                   ';
                })
            ->addColumn('no', function ($data)use (&$no){
                    return $no++;
                })
            ->addColumn('image', function ($data){

                    $return = "<img src='".url($data->thumb)."' style='width:50px;height:50px' />";
                    
                    return $return;
                })
            ->removeColumn('id')
            ->where('status_pengajuan',1)
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('backoffice.pengajuan.view')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $product->price = $request->get('price');
        $product->initial_price = $request->get('price');
        $product->status_pengajuan = 2;
        $product->save();

        return redirect('pengajuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
