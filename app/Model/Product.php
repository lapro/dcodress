<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Libraries\UploadImagesTrait;
use Libraries\ColorsOfImage\ColorsTrait;
use Libraries\SaveManyCheckIfDuplicateTrait;
use DB;

class Product extends Model
{
    //
    use ColorsTrait,SaveManyCheckIfDuplicateTrait; 
     

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

     public function images(){
        return $this->hasMany("App\Model\ProductImage");
     }

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

     	return $this->where('slug','=',$slug)->first();
     }

     public function discPrice($disc){

     	$this->price -= $disc;
     	return $this->save();

     }


     public function saveImages($images){
          
          $id = $this->id;
          $destinationPath = 'products';
          $product_image=array();

          // Making counting of uploaded images
         $file_count = count($images);
         // start count how many uploaded
         $uploadcount = 0;
         foreach($images as $file) {
             $filename = $this->kode.($uploadcount+1).".jpg";
             $upload_success = $file->move($destinationPath, $filename);
             
             $product_image[$uploadcount]["url"] = $destinationPath."/".$filename;
             $product_image[$uploadcount]["order"] = $uploadcount+1;
             $product_image[$uploadcount]["product_id"] = $id;
             $uploadcount ++;
         }

         if($uploadcount == $file_count){
               return DB::table("product_image")->insert($product_image);               
         }

         return false;
     
     }

     public function categories()
    {
        return $this->belongsToMany('App\Model\category',"category_product");
    }

    public function colors()
    {
        return $this->belongsToMany('App\Model\Color',"color_product");
    }


    public function saveColors(){
        $url = $this->images[0]->url;
        $id = $this->getId($this->getColors($url), new Color);
        $this->colors()->sync($id);
        //print_r($id);
        return $this;
    }
}
