<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoicePaymentByTransfer extends Model
{
    //
    protected $table = "invoice_payment_by_transfer";
    protected $fillable = [
    	"invoice_id" ,
        "trans_amount",
        "trans_date",
        "from_bank_name",
        "from_account_name",
        "from_rekening_number",
        "to_bank_name" ,
        "to_account_name",
        "to_rekening_number" ,
    ];
}
