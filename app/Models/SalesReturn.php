<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SalesReturn extends Model
{
    public function sales_invoices_table()
    {
        return $this->belongsTo(SalesInvoices::class, 'sales_invoice_id', 'id');
    }

    public function users_table()
    {
        return $this->belongsTo(User::class, 'sales_return_person_id', 'id');
    }

    public function sale_return_items_table()
    {
        return $this->hasMany(SalesReturnItem::class, 'sales_invoice_id', 'sales_invoice_id');
    }
}
