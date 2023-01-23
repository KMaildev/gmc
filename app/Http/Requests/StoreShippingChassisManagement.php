<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShippingChassisManagement extends FormRequest
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
            'arrival_item_id' => 'required',
            'purchase_item_id' => 'required',
            'purchase_order_id' => 'required',
            'arrival_information_id' => 'required',
            'file' => 'required',
        ];
    }
}
