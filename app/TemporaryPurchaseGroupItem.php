<?php

namespace App;

use App\Models\Brand;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use App\Models\TypeOfModel;
use Illuminate\Database\Eloquent\Model;

class TemporaryPurchaseGroupItem extends Model
{

    public function purchase_order_table()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id', 'id');
    }

    public function purchase_item()
    {
        return $this->belongsTo(PurchaseItem::class, 'purchase_item_id', 'id');
    }

    public function brands_table()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function type_of_models_table()
    {
        return $this->belongsTo(TypeOfModel::class, 'type_of_model_id', 'id');
    }
}
