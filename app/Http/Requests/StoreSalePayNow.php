<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalePayNow extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sales_invoice_id' => 'required',
            'sales_invoices_payment_id' => 'required',
            'payment_time' => 'required',
            'receive_by' => 'required',
            'received_date' => 'required',
            'payment_status' => 'required',
            'pay_amount' => "required|numeric",
        ];
    }
}
