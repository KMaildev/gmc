<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SalesJournal extends Model
{

    use LogsActivity;
    protected static $logName = 'sales_journals';
    protected static $logAttributes = ['sales_journal_date', 'customer_id', 'sales_invoice_id', 'post_ref', 'debited', 'credited', 'user_id', 'created_at', 'updated_at'];

    public function customers_table()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function sales_invoices_table()
    {
        return $this->belongsTo(SalesInvoices::class, 'sales_invoice_id', 'id');
    }
}
