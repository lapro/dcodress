<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Auth;
use DB;

use Datatables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('backoffice.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('backoffice.product.create')
        ->with('cat',Category::lists("name","id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Product $product)
    {
        //
        DB::beginTransaction();
        try{
        $images = $request->file('files');
        $product->name = ucfirst($request->get('name'));
        $product->user_id = Auth::user()->id;
        $product->slug = $product->getSlug($request->get('name'));
        $product->kode = Product::makeCode();
        $product->original_price = $request->get('original_price');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->weight = $request->get('weight');
        $product->status = $request->get('status');
        $product->save();
        $product->categories()->attach([$request->get('category')]);
        $product->saveImages($images);
        $product->saveColors();

        DB::commit();

        return redirect(url("backoffice/products"));
        }catch(\Exception $e){
            DB::rollback();
            throw ($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

     public function datatables(Request $request){
        
        $datas = Product::select([
                'id',
                'name',
                'status',
                'price',
                'original_price',
            ]);
        $no = $request->get('start')+1;

       return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                    return '
                    <a href="'.url("adm/products/$data->id/edit").'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="'.url("adm/products/$data->id").'" data-method = "DELETE" data-confirm="yakin untuk menghapus?" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                    ';
                })
            ->addColumn('no', function ($data)use (&$no){
                    return $no++;
                })
            ->addColumn('images', function ($data){
                    $images = $data->images;
                    $return = "";
                    foreach($images as $img){
                        $return .= "<img src='".url($img->url)."' style='width:50px;height:50px' />";
                    }

                    return $return;
                })
            ->removeColumn('id')
            ->make(true);
    }
}
