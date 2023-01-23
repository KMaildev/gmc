<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHpSalesInvoices extends FormRequest
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
            'sales_invoices_payment_id' => 'required',
            'customer_id' => 'required',

            'name' => 'required',
            'dealer_customer_id' => 'required',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
            'showroom_name' => 'required',
            'sales_type' => 'required',
            'payment_team' => 'required',
            'post_ref' => 'required',

            'productFields.*.product_id' => 'required',
            'productFields.*.qty' => 'required|numeric',
            'productFields.*.price' => 'required|numeric',

            'sales_persons_id' => 'required',
            'total_amount' => "required|numeric",
            'hp_loan_percentage' => "required|numeric",
            'hp_loan_amount' => "required|numeric",
            'hp_interest_rate_percentage' => "required|numeric",
            'hp_commission_fees' => "required|numeric",
            'hp_tenor' => "required|numeric",
            'hp_document_fees' => "required|numeric",
            'hp_stamp_duty' => "required|numeric",
            'hp_insurance' => "required|numeric",
            'hp_commission' => "required|numeric",
            'hp_service_charges' => "required|numeric",
            'hp_total_downpayment' => "required|numeric",
            'hp_monthly_payment' => "required|numeric",
            'hp_account_opening' => "required|numeric",
            'hp_total_services_fees' => "required|numeric",
        ];
    }
}
