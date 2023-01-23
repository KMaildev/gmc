<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Supplier extends Model
{

    protected $fillable = [
        'name', 'company_name', 'address', 'phone', 'email', 'description', 'created_at', 'updated_at'
    ];

    use LogsActivity;
    protected static $logName = 'suppliers_log';
    protected static $logAttributes = ['name', 'company', 'phone', 'description', 'created_at', 'updated_at'];
}
