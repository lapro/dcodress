<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\UserProfil;

class SettingController extends Controller
{	
	private $user ;
    
    //
    
    public function __construct(){
    	
    	$this->user = Auth::user();

    }

    public function postProfil(Request $request){
    	$profil = UserProfil::firstOrNew(['user_id'=>$this->user->id]);

    	$profil->handphone = $request->get('handphone');
    	$profil->city_name = $request->get('city_name');
    	$profil->city_id = $request->get('city_id');
    	$profil->province_name = $request->get('province_name');
    	$profil->province_id = $request->get('province_id');
    	$profil->address = $request->get('address');
    	$profil->save();

    	return redirect('settings');

    }
    
    public function getAs(){

    }
    public function getIndex(){

    	return view('member/setting/index');
    }

    
}
