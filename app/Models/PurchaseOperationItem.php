<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOperationItem extends Model
{
    public function purchase_items_table()
    {
        return $this->belongsTo(PurchaseItem::class, 'purchase_item_id', 'id');
    }
}
