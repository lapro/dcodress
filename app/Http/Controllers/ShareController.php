<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Model\Product;
use App\Model\SharingDiscount;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($slug)
    {
        //

        if(!Auth::check()){
            /* simpan session untuk memberitahu jika setelai login menuju halaman product tertentu */
            Session::put("redirectAfterLogin",url($slug)."#share=true");
            return redirect('auth/social-login-form')->with('caption',"Sebelumnya kamu harus login dulu ya..");
        }else{
            
            return view('display.share')->with('slug',$slug);   
        }
    }

   public function sharingDiscount($slug, $provider, Request $request, sharingDiscount $sd, Product $product){

        $user = Auth::user();
        $product = $product->getDataBySlug($slug);

        $disc = $this->makeDisc();

        //cek apakah user sudah pernah melakukan like
        if(!$user->haveShareProduct($provider, $slug)){

            //mengurangi harga (price) dari table barang sesuai disc
            $product->discPrice($disc);
            //simpan data sharing 
            $sd->user_id = $user->id;
            $sd->product_id = $product->id;
            $sd->provider = $provider;
            $sd->disc = $disc;
            $sd->save();

            return response()->json(['error'=>false]);
        }

        return response()->json(['error'=>true]);

        
   }

   private function makeDisc(){
        return 320;
   }
}
