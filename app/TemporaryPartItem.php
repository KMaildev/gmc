<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryPartItem extends Model
{
    public function spare_part_item_table()
    {
        return $this->belongsTo(SparePartItem::class, 'spare_part_item_id', 'id');
    }
}
