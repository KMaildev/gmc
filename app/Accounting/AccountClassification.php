<?php

namespace App\Accounting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AccountClassification extends Model
{
    use LogsActivity;
    protected static $logName = 'account_classifications_log';
    protected static $logAttributes = ['name', 'ac_code', 'created_at', 'updated_at'];
}
