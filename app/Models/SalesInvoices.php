<?php

namespace App\Models;

use App\Accounting\CashBook;
use App\Exports\UsersExport;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SalesInvoices extends Model
{
    use LogsActivity;
    protected static $logName = 'sales_invoices_log';
    protected static $logAttributes = ['customer_id', 'id_no', 'invoice_no', 'invoice_date', 'showroom_name',  'sales_type', 'payment_team', 'sales_persons_id', 'delivery_date', 'user_id',  'created_at', 'updated_at'];

    public function customers_table()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function sales_items_table()
    {
        return $this->hasMany(SalesItems::class, 'sales_invoice_id', 'id');
    }

    public function sales_invoices_payments_table()
    {
        return $this->belongsTo(SalesInvoicesPayments::class, 'id', 'sales_invoice_id');
    }

    public function users_table()
    {
        return $this->belongsTo(User::class, 'sales_persons_id', 'id');
    }

    public function cash_books_table()
    {
        return $this->hasMany(CashBook::class, 'sales_invoice_id', 'id');
    }

    public function hp_sales_sales_items_table()
    {
        return $this->belongsTo(SalesItems::class, 'id', 'sales_invoice_id');
    }
}
