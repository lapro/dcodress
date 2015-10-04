<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Model\Product;
use yajra\Datatables\Datatables;

class ProductsController extends Controller
{   
    public $no;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('adm/product/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $do='create';
        return view('adm/product/create')->with('do',$do);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Product $products)
    {   
        $data = $request->all();
        $data['slug'] = $products->getSlug($request->get('name'));
        $data['price'] = $request->get('original_price');
        $data['status'] = 1;
        $data['sharing_count'] = 0;
        $data['user_id'] = Auth::user()->id;
        $products->create($data);
        return redirect('adm/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $products=Product::findOrFail($id);
        return view('adm/product/show')->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $do='edit';
        $products=Product::findOrFail($id);
        $status=$products->status;
        return view('adm/product/edit')->with('products',$products)->with('do',$do);
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
        Products::findOrFail($id)->update($request->all());
        return redirect('adm/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('adm/products');
    }

    public function datatables(Request $request){
        
        $datas = Product::select([
                'id',
                'name',
                'status',
                'description',
                'price',
                'original_price',
                'capital_price',
                'sharing_count',
                'created_at',
                'updated_at'
            ]);
        $this->no = $request->get('start')+1;
       return Datatables::of($datas)
            ->addColumn('action', function ($data) {
                    return '
                    <a href="'.url("adm/products/$data->id/edit").'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="'.url("adm/products/$data->id").'" data-method = "DELETE" data-confirm="yakin untuk menghapus?" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                    ';
                })
            ->addColumn('rownum', function ($data){
                    return $this->no++;
                })
            ->removeColumn('id')
            ->make(true);
    
    }

    public function images($id){
        
        return view('adm/product/images')->with('id',$id);
    }

    public function uploadImages($id, Request $request, Product $product){
        $photo = $request->all();
        $response = $product->find($id)->upload($photo);
        return $response;
    }

    public function deleteImages($id, Request $request, Product $product){
        $filename = $request->get('id');
 
        if(!$filename)
        {
            return 0;
        }
 
        $response = $product->find($id)->deleteImage( $filename );
 
        return $response;
    }
}
