<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserProfil extends Model
{
    //
    protected $table = "user_profil";


    public $fillable = [
    'user_id',
    'handphone',
    'province_name',
    'city_name',
    'province_id',
    'city_id',
    'address',
    ];
}
