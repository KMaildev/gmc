<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseOperationInfo extends FormRequest
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
            'operation_date' => 'required',
            'particular' => 'required',
            'payment_operation' => 'required',
            'operation_status' => 'required',
            'purchase_order_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
