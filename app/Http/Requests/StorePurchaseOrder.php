<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseOrder extends FormRequest
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
            'supplier_id' => 'required',
            'purchase_no' => 'required|unique:purchase_orders,purchase_no',
            'purchase_date' => 'required',
            'purchase_representative_id' => 'required',

            'productFields.*.brand_id' => 'required',
            'productFields.*.type_of_model_id' => 'required',
            'productFields.*.qty' => 'required|numeric',
            'productFields.*.cif_usd' => 'required|numeric',

            'total_amount' => "numeric",
        ];
    }
}
