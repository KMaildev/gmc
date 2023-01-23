<?php

namespace App;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Model;

class PartSaleInvoice extends Model
{
    public function customers_table()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function users_table()
    {
        return $this->belongsTo(User::class, 'sales_persons_id', 'id');
    }

    public function part_sale_items_table()
    {
        return $this->hasMany(PartSaleItem::class, 'part_sale_invoice_id', 'id');
    }
}
