<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    //
    protected $table = "profil";

    public $fillable = ['user_id'];
}
