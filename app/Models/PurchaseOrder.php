<?php

namespace App\Models;

use App\Accounting\CashBook;
use App\User;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    public function supplier_table()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function users_table()
    {
        return $this->belongsTo(User::class, 'purchase_representative_id', 'id');
    }

    public function purchase_items_table()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_order_id', 'id');
    }

    public function purchase_operation_infos_table()
    {
        return $this->hasMany(PurchaseOperationInfo::class, 'purchase_order_id', 'id');
    }

    public function arrival_information_table()
    {
        return $this->hasMany(ArrivalInformation::class, 'purchase_order_id', 'id');
    }

    public function cash_books_table()
    {
        return $this->hasMany(CashBook::class, 'purchase_order_id', 'id');
    }
}
