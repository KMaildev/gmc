<?php

namespace App\Accounting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SubAccount extends Model
{
    use LogsActivity;
    protected static $logName = 'sub_account_log';
    protected static $logAttributes = ['coa_number', 'description', 'account_opening_balance', 'created_at', 'updated_at'];
}
