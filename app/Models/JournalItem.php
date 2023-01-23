<?php

namespace App\Models;

use App\Accounting\ChartofAccount;
use Illuminate\Database\Eloquent\Model;

class JournalItem extends Model
{
    public function chart_of_accounts_table()
    {
        return $this->belongsTo(ChartofAccount::class, 'chartof_account_id', 'id');
    }
}
