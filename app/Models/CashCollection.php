<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CashCollection extends Model
{

    use LogsActivity;
    protected static $logName = 'cash_collections_log';
    protected static $logAttributes = ['cash_collection_date', 'customer_id', 'sales_invoice_id', 'sales_journal_id', 'cash_debited', 'sale_discount_debited', 'credited', 'user_id', 'created_at', 'updated_at'];

    public function sales_invoices_table()
    {
        return $this->belongsTo(SalesInvoices::class, 'sales_invoice_id', 'id');
    }

    public function sales_journals_table()
    {
        return $this->belongsTo(SalesJournal::class, 'sales_journal_id', 'id');
    }

    public function customers_table()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }


    public function sale_pay_nows_table()
    {
        return $this->hasMany(SalePayNow::class, 'sales_invoice_id', 'sales_invoice_id');
    }
}
