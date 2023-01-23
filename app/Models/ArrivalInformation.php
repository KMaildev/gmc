<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArrivalInformation extends Model
{
    public function arrival_items_table()
    {
        return $this->hasMany(ArrivalItem::class, 'arrival_information_id', 'id');
    }
}
