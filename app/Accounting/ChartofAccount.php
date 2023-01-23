<?php

namespace App\Accounting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ChartofAccount extends Model
{

    use LogsActivity;
    protected static $logName = 'chart_of_account_log';
    protected static $logAttributes = ['coa_number', 'description', 'account_type_id', 'opening_balance_date', 'created_at', 'updated_at'];

    public function account_type_table()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id', 'id');
    }

    public function account_classifications_table()
    {
        return $this->belongsTo(AccountClassification::class, 'account_classification_id', 'id');
    }

    public function chartof_account_table()
    {
        return $this->belongsTo(ChartofAccount::class, 'chartof_account_id', 'id');
    }

    public function accounttypes()
    {
        return $this->hasMany(ChartofAccount::class);
    }


    public function account_types_table()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id', 'id');
    }


    // Reporting

    public function cash_books_table()
    {
        return $this->hasMany(CashBook::class, 'account_code_id', 'id');
    }
    
}
