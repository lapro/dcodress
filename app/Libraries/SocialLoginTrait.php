<?php 
namespace App\Libraries;

use Illuminate\Http\Request;
use Socialite;
use Session;
use App\Model\User;
use App\Model\SocialLogin;
use App\Model\Profil;
use Auth;
use App\model\role;

trait SocialLoginTrait
{
	
	public function getSocialLogin($provider, Request $request){

		if(!$request->all()){

            return Socialite::with($provider)->redirect();

        }else{

            $userSoc = Socialite::with($provider)->user();

            $user = $this->findOrCreateUser($userSoc, $provider);
            //set to session
            Auth::login($user);
            //set login message
            $this->loginMsg = "Selamat datang ".$user->name." ";

            Session::flash('msg', $this->loginMsg);

            if(Session::has("redirectAfterLogin")){

                $redirect = Session::get("redirectAfterLogin");
                Session::forget('redirectAfterLogin');
                return redirect($redirect);
            }

           //redirect to Home

            return redirect($this->redirectTo);
        }

	}

	private function findOrCreateUser($userSoc, $provider){
        
        $dataUser = User::where("email","=",$userSoc->email);

        if(!empty($dataUser)){
            $dataUser = User::create(['email'=> $userSoc->email]);
            $dataUser->avatar = $userSoc->avatar;
            $dataUser->name = $userSoc->name;
            $dataUser->save();


            $userRole = Role::whereName('member')->first();
            $dataUser->assignRole($userRole);

            $dataSocial = SocialLogin::firstOrNew(['user_id' => $dataUser->id]);
            $dataSocial->provider = $provider;
            $dataSocial->provider_id = $userSoc->id;
            $dataSocial->social_token = $userSoc->token;
            $dataSocial->save();

            $dataProfil = Profil::firstOrNew(['user_id'=>$dataUser->id]);
            $dataProfil->save();
        }   

        return $dataUser;
    }
    
    public function getSocialLoginForm(Request $request){

        $caption = (Session::has('caption')) ? Session::get('caption') : "Silahkan Login dengan akun sosial anda";

        if($request->ajax()){

            return view('auth.member.modal-form')->with('caption',$caption);
        }
        else{
            return "form";
        }

    }
}