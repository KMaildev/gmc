<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemporaryPurchaseItem extends Model
{
    public function brands_table()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function type_of_models_table()
    {
        return $this->belongsTo(TypeOfModel::class, 'type_of_model_id', 'id');
    }
}
