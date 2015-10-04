<?php

use Illuminate\Database\Seeder;
use App\Model\Configuration;
class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Configuration::create([
        		'conf_key'=>"origin_shipment",
        		"conf_val"=>"327",
        	]);
    }
}
