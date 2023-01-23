<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCashCollection extends FormRequest
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
            'cash_collection_date' => 'required',
            'customer_id' => 'required',
            'sales_invoice_id' => 'required',
            'sales_journal_id' => 'required',
            'cash_debited' => "numeric",
            'sale_discount_debited' => "numeric",
            'credited' => "numeric",
        ];
    }
}
