<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartSaleInvoice extends FormRequest
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
            'customer_id' => 'required',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
            'showroom_name' => 'required',
            'sales_type' => 'required',
            'sales_persons_id' => 'required',
            'total_amount' => 'numeric',
            'tax' => 'numeric',
            'discount' => 'numeric',

        ];
    }
}
