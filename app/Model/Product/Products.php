<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table="products";
	protected $guard=['id'];
	protected $fillable=[
		'name',
		'original_price',
		'price',
		'description',
		'status'
	];

}
