<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesInvoicesPayments extends Model
{
    public function customers_table()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }
}
