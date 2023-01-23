<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SaleRefund extends Model
{

    use LogsActivity;
    protected static $logName = 'sale_refund_log';
    protected static $logAttributes = ['sales_invoice_id', 'refund', 'refund_date', 'user_id', 'created_at', 'updated_at'];


    public function users_table()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sales_invoice_table()
    {
        return $this->belongsTo(SalesInvoices::class, 'sales_invoice_id', 'id');
    }
}
