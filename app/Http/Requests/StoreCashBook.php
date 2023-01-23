<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCashBook extends FormRequest
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
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',
            // 'account_code' => 'required',
            // 'account_type_id' => 'required',
            'cash_in' => "numeric",
            'cash_out' => "numeric",
            'bank_in' => "numeric",
            'bank_out' => "numeric",
        ];
    }
}
