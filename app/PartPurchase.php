<?php

namespace App;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;

class PartPurchase extends Model
{
    public function supplier_table()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function users_table()
    {
        return $this->belongsTo(User::class, 'purchase_persons_id', 'id');
    }

    public function part_purchase_items_table()
    {
        return $this->hasMany(PartPurchaseItem::class, 'part_purchase_id', 'id');
    }
}
