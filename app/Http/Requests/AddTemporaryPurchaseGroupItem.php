<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTemporaryPurchaseGroupItem extends FormRequest
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
            'purchase_item_id' => 'required',
            'qty' => 'required',
            'cif_usd' => 'required',
        ];
    }
}
