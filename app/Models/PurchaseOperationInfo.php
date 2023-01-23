<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOperationInfo extends Model
{
    public function purchase_operation_items_table()
    {
        return $this->hasMany(PurchaseOperationItem::class, 'purchase_operation_info_id', 'id');
    }
}
