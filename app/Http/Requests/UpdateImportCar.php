<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImportCar extends FormRequest
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
            'commodity' => 'required',
            'id_no' => 'required',
            'unit' => 'required',
            'quantity' => 'numeric',
            'amount_usd' => 'numeric',
            'exchange_rate' => 'numeric',
            'adjustment_value_ad' => 'numeric',
            'import_duty_other_tax_percent' => 'numeric',
            'commercial_tax_percent' => 'numeric',
            'maccs_service_fee' => 'numeric',
            'security_fee' => 'numeric',
            'redemption_fine' => 'numeric',
            'advance_tax_percent' => 'numeric',
        ];
    }
}
