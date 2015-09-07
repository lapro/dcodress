<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Str;

class Products extends Model
{
    protected $table="products";
	protected $guard=['id'];
	protected $fillable=[
		'name',
		'original_price',
		'price',
		'description',
		'status',
		'slug'
	];

	public function getSlug($title)
	{
    	$slug = Str::slug($title);
    	$slugCount = count( $this->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
 
	    return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
	}
}
