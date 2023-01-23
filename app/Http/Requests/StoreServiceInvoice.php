<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceInvoice extends FormRequest
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
            'types_of_service_id' => 'required',
            'sales_persons_id' => 'required',
            'sub_total' => 'numeric',
            'tax' => 'numeric',
        ];
    }
}
