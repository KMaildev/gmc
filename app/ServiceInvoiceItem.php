<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceInvoiceItem extends Model
{
    public function spare_part_items_table()
    {
        return $this->belongsTo(SparePartItem::class, 'spare_part_item_id', 'id');
    }
}
