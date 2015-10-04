<?php namespace Libraries\ColorsOfImage;


use Libraries\ColorsOfImage\ColorsOfImage;

trait ColorsTrait{

	/* 

	kamu bisa inisialisasikan property dan folder dari gambar di parentclass dengan
	public $imageFolder="";
	public $imageProperty="";

	*/
	public function getColors($url){

		$property = $this->imageProperty;
		
		$imageUrl = $url;
		$image = new ColorsOfImage( $imageUrl );

        // get the prominent colors
        $colors = $image->getProminentColors();

        return $colors; //array
	}

}