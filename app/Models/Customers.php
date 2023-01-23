<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Customers extends Model
{

    protected $fillable = [
        'name', 'company_name', 'dealer_code', 'city', 'address', 'phone', 'email', 'description', 'dealer_or_hp', 'dealer_customer_id', 'created_at', 'updated_at'
    ];

    use LogsActivity;
    protected static $logName = 'customers_log';
    protected static $logAttributes = ['name', 'company_name', 'dealer_code', 'city', 'address',  'phone', 'description',  'created_at', 'updated_at'];


    public function customers_table()
    {
        return $this->belongsTo(Customers::class, 'dealer_customer_id', 'id');
    }
}
