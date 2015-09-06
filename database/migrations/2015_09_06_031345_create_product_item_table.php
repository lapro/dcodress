<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('item_type_id')->unsigned();
            $table->integer('product_id')->unsigned();
            //$table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('item_type_id')->references('id')->on('item_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_item');
    }
}
