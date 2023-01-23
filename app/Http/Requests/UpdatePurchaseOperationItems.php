<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseOperationItems extends FormRequest
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
            'purchase_operation_item_id' => 'required',
            'particular_qty' => 'required|numeric',
            'payment_operation_amount' => 'required|numeric',
            'exchange_rate' => 'required|numeric',
        ];
    }
}
