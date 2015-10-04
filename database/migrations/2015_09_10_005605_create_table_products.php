<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            $table->string('name');
            $table->float('weight');
            $table->double('price',16,2);
            $table->double('original_price',16,2);
            $table->double('capital_price',16,2);
            $table->integer('status'); // 0=> available, 1=>sold
            $table->string('description');
            $table->string('slug')->unique();
            $table->integer('sharing_count')->unsigned();
            $table->double('min_price',16,2);
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
