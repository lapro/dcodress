<?php

use Illuminate\Database\Seeder;
use App\Model\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Product::create([
        		"name" => "sunday outfit",
        		"slug" => "sunday-outfit",
        		"price"=> 230000,
        		"capital_price" => 200000,
        		"original_price"=>230000,
        		"min_price"=>210000,
        		"description" =>"asdasdasda asdas dasd asda sd",
        		"weight"=>500,
                "user_id"=>1,
        	]);
    }
}
