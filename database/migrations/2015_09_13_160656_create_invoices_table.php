<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',50);
            $table->integer('user_id')->unsigned()->nullable();
            $table->double('total',16,2);
            $table->integer('payment_method')->unsigned();
            $table->integer('status')->unsigned();
            $table->date('confirmation_date');
            $table->date('verification_date');

            $table->string('email');
            $table->string('name');
            $table->string('handphone');
            $table->string('province',30);
            $table->integer('province_id');
            $table->string('city',30);
            $table->integer('city_id');
            $table->string('district',30);
            $table->integer('district_id');
            $table->string('address');
            
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
        Schema::drop('invoices');
    }
}
