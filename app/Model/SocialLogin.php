<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SocialLogin extends Model
{
    //

    protected $table = "social_login";

    public $fillable = ['user_id'];

}
