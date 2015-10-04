<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicePaymentByTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_payment_by_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');

            $table->double('trans_amount',16,2);
            $table->date('trans_date');
            $table->string('from_bank_name');
            $table->string('from_rekening_number');
            $table->string('from_account_name');
            $table->string('to_bank_name');
            $table->string('to_rekening_number');
            $table->string('to_account_name');
            
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
        Schema::drop('invoice_payment_by_transfer');
    }
}
