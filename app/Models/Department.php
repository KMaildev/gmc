<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Department extends Model
{
    use LogsActivity;
    protected static $logName = 'departments_log';
    protected static $logAttributes = ['title', 'created_at', 'updated_at'];
}
