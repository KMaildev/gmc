<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesItems extends Model
{
    public function products_table()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }


    public function sales_invoices_table()
    {
        return $this->belongsTo(SalesInvoices::class, 'sales_invoice_id', 'id');
    }


    // public function sales_invoices_payments_table()
    // {
    //     return $this->belongsTo(SalesInvoicesPayments::class, 'sales_invoice_id', 'id');
    // }

    public function sales_invoices_payments_table()
    {
        return $this->hasMany(SalesInvoicesPayments::class, 'id', 'sales_invoice_id');
    }
}
