<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SalePayNow extends Model
{

    use LogsActivity;
    protected static $logName = 'sale_pay_now_log';
    protected static $logAttributes = ['sales_invoice_id', 'sales_invoices_payment_id', 'receive_by', 'payment_status', 'payment_time', 'remark', 'received_date', 'pay_amount', 'user_id', 'created_at', 'updated_at'];

    public function users_table()
    {
        return $this->belongsTo(User::class, 'receive_by', 'id');
    }
}
