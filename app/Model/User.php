<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\Model\SharingDiscount;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','username'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function socialLogin(){

        return $this->hasOne("App\Model\SocialLogin");
    
    }

    public function profil(){

        return $this->hasOne("App\Model\Profil");
    
    }

    public function sharingDiscount(){

        return $this->hasMany('App\Model\SharingDiscount');
    }

    public function haveShareProduct($provider, $slug){
        $sharingDiscount = new SharingDiscount;
        $cekUserProduct =  $sharingDiscount->cekUserProduct($provider, $slug, $this->id);
        
        return ($cekUserProduct) ? true : false ; 
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role')->withTimestamps();
    }
    
    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if($role->name == $name) return true;
        }
 
        return false;
    }
 
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }
 
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

}
