<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Libraries\SocialLoginTrait;
use App\Http\Requests;
use DB;
use Request;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    public $redirectTo = "/";
    
    public $loginPath = "/login";

    use AuthenticatesAndRegistersUsers, ThrottlesLogins, SocialLoginTrait;



    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        if(Session::has("redirectAfterLogin")){
            $this->redirectTo = Session::get("redirectAfterLogin");
        }
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {   
        DB::beginTransaction();

        try{

            $user = User::create([
                'name' => ucfirst($data['name']),
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $user->assignRole(4);

        }catch(\Exception $e){

            DB::rollback();
            throw $e;
        }    

        DB::commit();

        return $user;
    }

    public function getLogin(){

        if(Request::ajax()){
            return view("auth.modal_login");
        }

        return view("auth.login");
    }

    
}
