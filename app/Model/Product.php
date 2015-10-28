<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Libraries\ColorsOfImage\ColorsTrait;
use App\Libraries\SaveManyCheckIfDuplicateTrait;
use DB;
use Conner\Tagging\Taggable;
use App\Libraries\UploadableImageTrait;

class Product extends Model
{
    //
    use ColorsTrait,SaveManyCheckIfDuplicateTrait, Taggable, UploadableImageTrait ;
     

     protected $table = 'products';


     protected $fillable = [
     'user_id',
     'name', 
     'kode',
     'price', 
     'original_price',
     'slug',
     'status',
     'description',
     'weight'
     ];

     //use UploadImagesTrait;


     public static function makeCode(){

          $kode = date("Ymd")*1000;
          $maxToday = Product::where('created_at',"like","%".date('Y-m-d')."%")->count()+1;
     
          return $kode+$maxToday;
     }

     public function getSlug($name){

     	$slug = Str::slug($name);
     	$slugCount = count( $this-> whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());

     	return ($slugCount>0) ? "{$slug}-{$slugCount}" : $slug;
     }

     public function getDataBySlug($slug){
        $id = explode("-", $slug)[0];
        $product = Product::find($id);
     	return $product;
     }

     public function discPrice($disc){

     	$this->price -= $disc;
     	return $this->save();

     }

     public function caraPromo(){

        return $this->belongsToMany('App\Model\CaraPromo','product_cara_promo');
     }

     public function statusPengajuan(){

        return $this->belongsTo("App\Model\status_pengajuan");
     }

    public function author(){

        return $this->belongsTo('App\Model\User','user_id');
    }

    public function hasCaraPromo($name){

        foreach($this->caraPromo as $cp)
        {
            if($cp->name == $name) return true;
        }
 
        return false;
    }

}
 