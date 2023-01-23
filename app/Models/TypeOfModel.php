<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfModel extends Model
{
    public function brands_table()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
