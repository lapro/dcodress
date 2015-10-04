<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
     protected $table = "colors";
     public $timestamps = false;
     protected $fillable = ["name"];
}
