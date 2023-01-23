<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemporarySalesItem extends Model
{
    public function products_table()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
