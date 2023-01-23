<?php

namespace App;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Model;

class ServiceInvoice extends Model
{
    public function customers_table()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function users_table()
    {
        return $this->belongsTo(User::class, 'sales_persons_id', 'id');
    }

    public function types_of_service_table()
    {
        return $this->belongsTo(TypesOfService::class, 'types_of_service_id', 'id');
    }

    public function service_invoice_items()
    {
        return $this->hasMany(ServiceInvoiceItem::class, 'service_invoice_id', 'id');
    }
}
