<?php

namespace App\Models;

use App\Accounting\ChartofAccount;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Products extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product', 'type', 'model_no', 'model_year', 'configuration', 'body_color', 'interior_color', 'engine_power', 'chessi_no', 'engine_no', 'weight', 'door', 'seater', 'vehicle_no', 'quantity', 'remark', 'user_id', 'user_id', 'created_at', 'updated_at', 'brand_name', 'commodity', 'id_no', 'unit', 'amount_usd', 'exchange_rate', 'adjustment_value_ad', 'import_duty_other_tax_percent', 'commercial_tax_percent', 'maccs_service_fee', 'security_fee', 'redemption_fine', 'advance_tax_percent', 'import_date',
    ];

    use LogsActivity;
    protected static $logName = 'products_log';
    protected static $logAttributes = ['product', 'brand_id', 'brand_name', 'quantity', 'created_at', 'updated_at'];

    public function brands_table()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }


    public function sales_items_table()
    {
        return $this->belongsTo(SalesItems::class, 'id', 'product_id');
    }

    public function sales_return_items_table()
    {
        return $this->belongsTo(SalesReturnItem::class, 'id', 'product_id');
    }


    public function sales_items_table_for_inventory()
    {
        return $this->hasMany(SalesItems::class, 'product_id', 'id');
    }


    public function sales_return_items_table_for_inventory()
    {
        return $this->hasMany(SalesReturnItem::class, 'product_id', 'id');
    }
}
