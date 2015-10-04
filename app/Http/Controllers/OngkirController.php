<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;

use App\Model\Configuration;
use Session;
use Cart;
use GuzzleHttp\Exception\ClientException;


class OngkirController extends Controller
{
    //
    public $apikey = "b6d7592c7897357f64ceb1cd3a2d8eff";

    public function getProvince(){
    	$response=$this->getHttpClient()->get("http://rajaongkir.com/api/starter/province?key=".$this->apikey)->getBody();
    	$decode = json_decode((string)$response);
    	$province = "";
    	foreach($decode->rajaongkir->results as $val){
    		$province .="<option value='$val->province_id'>$val->province</option>";
    	}

    	return $province;
    }

    public function getCity(Request $request){
    	$province_id =  $request->get('province_id');
    	$response=$this->getHttpClient()->get("http://rajaongkir.com/api/starter/city?key=".$this->apikey."&province=".$province_id)->getBody();
    	$decode = json_decode((string)$response);
    	$data = "";
    	foreach($decode->rajaongkir->results as $val){
    		$data .="<option value='$val->city_id'>$val->city_name</option>";
    	}

    	return $data;
    }

    public function getCost(Request $request){
        $origin = Configuration::getVal('origin_shipment');
        $destination =  $request->get("city");
        $weight= $this->getCountWeight();
        $courier = "jne";

        $response=$this->getHttpClient()->request("POST","http://rajaongkir.com/api/starter/cost",array(
                'form_params' => [
                        'key'=>$this->apikey,
                        'origin'=>$origin,
                        "destination" => $destination,
                        "weight"=> $weight,
                        "courier"=>$courier,
                     ]
            ))->getBody();
        $decode = json_decode((string)$response);
        $result = $decode->rajaongkir->results;
        $ongkir = ($this->ekstrakOngkir($result)-25000);
        Session::put('ongkir',$ongkir);
        //dd( Session::get('ongkir'));  
        return $ongkir;
    }

    private function ekstrakOngkir($data){

        $decode = $data[0];
        foreach ($decode->costs as $key => $value) {
            if($value->service == "YES"){
                return (float) $value->cost[0]->value;
            }elseif($value->service == "REG"){
                return (float) $value->cost[0]->value;
            }
        }

        return 40000;//harga perkiraan 40 ribu
    }

    public function getCountWeight(){
        $total_weight = 0;
        foreach (Cart::content() as $key => $value) {
            $total_weight += (float) $value->options->weight;
        }

        return $total_weight;
    }

    protected function getHttpClient()
    {   
        $handler = new \GuzzleHttp\Handler\CurlHandler();
        $stack = HandlerStack::create($handler); // Wrap w/ middleware
        return new \GuzzleHttp\Client(['handler' => $stack]);
    }
}
