<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupInvoicePurchaseOrder extends FormRequest
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
            'productFields.*.brand_id' => 'required',
            'productFields.*.type_of_model_id' => 'required',
            'productFields.*.purchase_order_id' => 'required',
            'productFields.*.purchase_item_id' => 'required',
        ];
    }
}
