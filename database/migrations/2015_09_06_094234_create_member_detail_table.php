<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('handphone');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('district');
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
        Schema::drop('member_detail');
    }
}
