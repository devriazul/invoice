<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no',
        'invoice_date',
        'due_date',
        'email',
        'client',
        'client_address',
        'payment_details',
        'sub_total',
        // 'discount',
        // 'grand_total',
    ];
    public function products(){
        return $this->hasMany((InvoiceProduct::class));
    }
}
