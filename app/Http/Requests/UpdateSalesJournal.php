<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesJournal extends FormRequest
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
        $id = $this->route('sales_journal');
        return [
            'sales_journal_date' => 'required',
            'customer_id' => 'required',
            'sales_invoice_id' => 'required',
            'post_ref' => 'required|unique:sales_journals,post_ref,' . $id,
            'debited' => "numeric",
            'credited' => "numeric",
        ];
    }
}
