<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Product;

class SharingDiscount extends Model
{
    //

    protected $table = "sharing_discount";

    public $fillable = ['user_id','product_id'];

   public function cekUserProduct($provider, $slug, $id_user){
      $product = new Product;
   		$id_product = $product->getDataBySlug($slug)->id;
   		$data = $this->where('product_id','=',$id_product)
   						->where('user_id','=',$id_user)
   						->where('provider','=', $provider)
   						->count();
   		
   		return ($data>0) ? true : false;
   		
   }

}
