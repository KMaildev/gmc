<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Brand extends Model
{
    use LogsActivity;
    protected static $logName = 'brands_log';
    protected static $logAttributes = ['name', 'created_at', 'updated_at'];
}
