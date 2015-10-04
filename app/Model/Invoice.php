<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\InvoiceItem;
use DB;
use Auth;
use Cart;

class Invoice extends Model
{
    //
    protected $table="invoices";
    protected $fillable = [
    	"kode",
    	"total",
    	"status",
    	"user_id",
        "name",
        "email",
        "handphone",
        "province",
        "province_id",
        "city",
        "city_id",
        "address",
        "ongkir",
    ];

    public function items(){
    	return $this->hasMany("App\Model\InvoiceItem");
    }

    public function transferDetail(){
        return $this->hasOne("App\Model\InvoicePaymentByTransfer");
    }


    public static function makeKode(){
    	$kode = date("Ymd")*1000;
    	$maxToday = Invoice::where('created_at',"like","%".date('Y-m-d')."%")->count()+1;
    	
    	return $kode+$maxToday;
    }

    public static function createInvoice($invoiceSess,$ongkir){

    	return DB::transaction(function() use ($invoiceSess, $ongkir){

    	$kode = Invoice::makeKode();
    	$ongkirnya = ($ongkir>0) ? $ongkir : 0;
    	$user_id = (Auth::check()) ? Auth::user()->id : Null;
    	$total = Cart::total() + $ongkirnya;

    	$invoice = Invoice::create([
    		"kode"=>$kode,
    		"total"=>$total,
    		"status"=>1,
    		"user_id"=>$user_id,
            "name"=>$invoiceSess['user']['u_name'],
            "email"=>$invoiceSess['user']['u_email'],
            "handphone"=>$invoiceSess['user']['u_handphone'],
            "province"=>$invoiceSess['destination']['province'],
            "province_id"=>$invoiceSess['destination']['province_id'],
            "city"=>$invoiceSess['destination']['city'],
            "city_id"=>$invoiceSess['destination']['city_id'],
            "address"=>$invoiceSess['destination']['address'],
            "ongkir"=>$ongkirnya,
    		]);
    	$insert =array();

    	foreach (Cart::content() as $key => $value) {
    		$insert[] =[
    			"invoice_id" => $invoice->id,
    			"product_id" => $value->id,
    			"name"	=>	$value->name,
    			"qty" => $value->qty,
    			"price"=>$value->price,
    			"subtotal"=>$value->price,
    		];
    	}

    	DB::table('invoice_items')->where('invoice_id','=',$invoice->id)->delete();
    	DB::table('invoice_items')->insert($insert);

    	return $kode;
    	});

    }

    public function getAddress(){
        return $this->address." <br>Kota : ".$this->city." <br>Provinsi : ". $this->province;
    }


    public function getStatusAttribute($value){
         $status = DB::table('invoice_status')->select('name')->where('id','=',$value)->first();
         return $status->name;
    }

    public function getPaymentMethodAttribute($value){
         $status = DB::table('payment_method')->select('name')->where('id','=',$value)->first();
         return (!empty($status)) ? $status->name : " - ";
    }


}
