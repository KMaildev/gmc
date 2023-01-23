<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubAccount extends FormRequest
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
        $id = $this->route('subaccount');
        return [
            'main_account_code' => 'required',
            'sub_account_number' => 'required|unique:chartof_accounts,coa_number,' . $id,
            'account_type' => 'required',
            'account_classification_id' => 'required',
            'description' => 'required',
            'opening_balance' => "numeric",
        ];
    }
}
