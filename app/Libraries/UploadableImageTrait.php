<?php namespace App\Libraries;

use Intervention\Image\ImageManager;
use File;

trait UploadableImageTrait{

	public static function uploadImage($photo, $location, $filename)
    {	

        if(!File::exists($location)) {
        
            File::makeDirectory($location);
        }   
        $manager = new ImageManager();
        $image = $manager->make($photo)->resize(450, null, function($constraint){$constraint->aspectRatio();})->save($location.$filename);
         
        return $image;
    }

    public static function uploadImageThumb($photo, $location, $filename)
    {   

        if(!File::exists($location)) {
        
            File::makeDirectory($location);
        }   
        $manager = new ImageManager();
        $image = $manager->make($photo)->fit(450)->save($location.$filename);
         
        return $image;
    }
}