<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Libraries\ColorsOfImage\ColorsTrait;
use Libraries\SaveManyCheckIfDuplicateTrait;
use App\Model\Color;

class Post extends Model
{
    
    //digunakan pada ColorsTrait
    public $imageFolder = "posts/";

    use ColorsTrait,SaveManyCheckIfDuplicateTrait; 

    protected $table = "posts";

    public function colors()
    {
        return $this->belongsToMany('App\Model\Color',"post_color");
    }

     public function categories()
    {
        return $this->belongsToMany('App\Model\category',"category_post");
    }

    public function makeKode(){
    	return md5(uniqid());
    }

    public function uploadImage($photo, $filename)
    {	
    	$folder = "posts/";
        $manager = new ImageManager();
        $image = $manager->make($photo )->encode('jpg')->save($folder.$filename);
 
        return $image;
    }

    public function saveColors(){

        $url = $this->imageFolder.$this->image;
        $id = $this->getId($this->getColors($url), new Color);
        $this->colors()->sync($id);
        //print_r($id);
        return $this;
    }
}
