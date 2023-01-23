<?php

namespace App\Accounting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AccountType extends Model
{

    use LogsActivity;
    protected static $logName = 'account_types_log';
    protected static $logAttributes = ['number', 'description', 'created_at', 'updated_at'];

    public function account_classifications()
    {
        return $this->belongsTo(AccountClassification::class, 'account_classification_id', 'id');
    }
}
