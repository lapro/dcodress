<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //

    protected $table='configuration';
    protected $fillable = [
    	"conf_key",
    	"conf_val"
    ];

    public static function getVal($key){

    	return Configuration::where("conf_key","=",$key)->first()->conf_val;
    }
}
