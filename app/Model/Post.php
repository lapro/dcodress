<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Libraries\ColorsOfImage\ColorsTrait;
use App\Libraries\SaveManyCheckIfDuplicateTrait;

use App\Libraries\UploadableImageTrait;

use App\Model\Color;
use App\Model\Category;
use Illuminate\Support\Str;

use DB;
use Auth;
use Conner\Tagging\Taggable;

class Post extends Model
{
    
    //digunakan pada ColorsTrait
    public $imageFolder = "posts/";

    use ColorsTrait, SaveManyCheckIfDuplicateTrait, Taggable, UploadableImageTrait; 

    protected $table = "posts";

    public function colors()
    {
        return $this->belongsToMany('App\Model\Color',"post_color");
    }

    public function author(){

        return $this->belongsTo('App\Model\User','user_id');
    }



    public function saveColors(){

        $url = $this->imageFolder.$this->image;
        $id = $this->getId($this->getColors($url), new Color);
        $this->colors()->sync($id);
        //print_r($id);
        return $this;
    }

    public function lovable($insert = false){
        if(Auth::check()){
        $post_id = $this->id;

        $c = DB::table("post_loves")
                ->where('user_id','=',Auth::user()->id)
                ->where('post_id','=',$post_id)
                ->count();

        if($c == 0){
            
            if($insert == true){
                
                DB::table("post_loves")->insert(['user_id'=>Auth::user()->id, "post_id"=>$post_id]);
                $this->loves += 1;
                $this->save();
            }
            
            return true;
        }
        }

        return false;
    }


}
