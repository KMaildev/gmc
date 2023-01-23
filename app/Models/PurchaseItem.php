<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    public function products_table()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function brands_table()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function type_of_models_table()
    {
        return $this->belongsTo(TypeOfModel::class, 'type_of_model_id', 'id');
    }

    public function purchase_orders_table()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_original_id', 'id');
    }

    public function purchase_items_table()
    {
        return $this->belongsTo(PurchaseItem::class, 'purchase_item_id', 'id');
    }

    public function arrival_items_table()
    {
        return $this->hasMany(ArrivalItem::class, 'purchase_item_id', 'id');
    }


    public function purchase_operation_items_table()
    {
        return $this->belongsTo(PurchaseOperationItem::class, 'id', 'purchase_item_id');
    }
}
