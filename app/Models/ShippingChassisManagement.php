<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingChassisManagement extends Model
{
    protected $fillable = [
        'product',
        'type',
        'model_no',
        'model_year',
        'configuration',
        'body_color',
        'interior_color',
        'engine_power',
        'chassis_no',
        'engine_no',
        'weight',
        'door',
        'seater',
        'vehicle_no',
        'quantity',
        'remark',
        'user_id',
        'created_at',
        'updated_at',
        'brand_name',
        'commodity',
        'id_no',

        'arrival_item_id',
        'purchase_item_id',
        'purchase_order_id',
        'arrival_information_id',
    ];

    public function products_table()
    {
        return $this->hasMany(Products::class, 'chessi_no', 'chassis_no');
    }
}
