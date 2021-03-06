<?php

namespace App\Http\Controllers\Butik;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Model\Product;
use App\Model\SharingDiscount;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;

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
            Session::put("redirectAfterLogin",url("butik/".$slug)."#share=true");

            return redirect('login')->with('caption',"Sebelumnya kamu harus login dulu ya..");
        
        }else{
            
            return view('butik.display.share_form')->with('slug',$slug);   
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

            $this->tesFireBase($product->price, $product->slug);

            return response()->json(['error'=>false]);
        }

        return response()->json(['error'=>true]);

        
   }

   private function tesFireBase($harga,$slug){
    //$slug="sunday-outfit";
    $response=$this->getHttpClient()->put(
        "https://glaring-fire-934.firebaseio.com/products/$slug.json",[
        "json"=>[
                    "price"=>$harga,
                    "updated_at"=>date("Y-m-d")
                ]
        ]
    );

    return $response->getBody();
   }

   private function makeDisc(){
        return 320;
   }

    protected function getHttpClient()
    {   
        $handler = new \GuzzleHttp\Handler\CurlHandler();
        $stack = HandlerStack::create($handler); // Wrap w/ middleware
        return new \GuzzleHttp\Client(['handler' => $stack]);
    }
}
