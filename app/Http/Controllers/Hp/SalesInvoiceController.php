<?php

namespace App\Http\Controllers\Hp;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHpSalesInvoices;
use App\Http\Requests\UpdateHpSalesInvoices;
use App\Models\Customers;
use App\Models\Products;
use App\Models\SalesInvoices;
use App\Models\SalesInvoicesPayments;
use App\Models\SalesItems;
use App\Models\TemporarySalesItem;
use App\User;
use Illuminate\Http\Request;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_invoices = SalesInvoices::orderBy('id')->where('hp_or_dealer', 'hp')->get();
        return view('hp.sales_invoice.index', compact('sales_invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session_id = session()->getId();
        $customers = Customers::orderBy('id')->where('dealer_or_hp', 'dealer')->get();
        $products = Products::all();
        $sales_persons = User::all();
        $temporary_sales_items = TemporarySalesItem::orderBy('id')->where('session_id', $session_id)->get();
        return view('hp.sales_invoice.create', compact('customers', 'products', 'temporary_sales_items', 'sales_persons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHpSalesInvoices $request)
    {
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->dealer_customer_id = $request->dealer_customer_id;
        $customer->dealer_or_hp = $request->dealer_or_hp;
        $customer->save();
        $customer_id = $customer->id;


        $sale_invoice = new SalesInvoices();
        $sale_invoice->customer_id = $customer_id;
        $sale_invoice->invoice_no = $request->invoice_no;
        $sale_invoice->invoice_date = $request->invoice_date;
        $sale_invoice->id_no = $request->id_no;
        $sale_invoice->showroom_name = $request->showroom_name;
        $sale_invoice->sales_type = $request->sales_type;
        $sale_invoice->payment_team = $request->payment_team;
        $sale_invoice->sales_persons_id = $request->sales_persons_id;
        $sale_invoice->delivery_date = $request->delivery_date;
        $sale_invoice->post_ref = $request->post_ref;
        $sale_invoice->user_id = auth()->user()->id ?? 0;
        $sale_invoice->hp_or_dealer = 'hp';
        $sale_invoice->save();
        $sale_invoice_id = $sale_invoice->id;

        foreach ($request->productFields as $key => $value) {
            $insert[$key]['product_id'] = $value['product_id'];
            $insert[$key]['qty'] = $value['qty'];
            $insert[$key]['unit_price'] = $value['price'];
            $insert[$key]['description'] = $value['description'];
            $insert[$key]['sales_invoice_id'] = $sale_invoice_id;
            $insert[$key]['sale_types'] = 'hp';
            $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
            $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
        }
        SalesItems::insert($insert);

        $sale_inv_payment = new SalesInvoicesPayments();
        $sale_inv_payment->total_amount = $request->total_amount;
        $sale_inv_payment->down_payment = $request->down_payment;

        $sale_inv_payment->discount = 0; //$request->discount;
        $sale_inv_payment->dealer_ercentage = 0;  //$request->dealer_percentage;
        $sale_inv_payment->balance_to_be_pay = 0; //$request->balance_to_be_pay;
        $sale_inv_payment->balance_to_pay_be_date = 0; //$request->balance_to_pay_be_date;


        $sale_inv_payment->hp_loan_percentage = $request->hp_loan_percentage ?? 0;
        $sale_inv_payment->hp_loan_amount = $request->hp_loan_amount ?? 0;
        $sale_inv_payment->hp_interest_rate_percentage = $request->hp_interest_rate_percentage ?? 0;
        $sale_inv_payment->hp_commission_fees = $request->hp_commission_fees ?? 0;
        $sale_inv_payment->hp_tenor = $request->hp_tenor ?? 0;
        $sale_inv_payment->hp_account_opening = $request->hp_account_opening ?? 0;

        $sale_inv_payment->hp_stamp_duty = $request->hp_stamp_duty ?? 0;
        $sale_inv_payment->hp_stamp_duty_amount = $request->hp_stamp_duty_amount ?? 0;

        $sale_inv_payment->hp_insurance = $request->hp_insurance ?? 0;
        $sale_inv_payment->hp_insurance_amount = $request->hp_insurance_amount ?? 0;

        $sale_inv_payment->hp_document_fees = $request->hp_document_fees ?? 0;
        $sale_inv_payment->hp_commission = $request->hp_commission ?? 0;

        $sale_inv_payment->hp_total_downpayment = $request->hp_total_downpayment ?? 0;
        $sale_inv_payment->hp_monthly_payment = $request->hp_monthly_payment ?? 0;

        $sale_inv_payment->hp_service_charges = $request->hp_service_charges ?? 0;
        $sale_inv_payment->hp_service_charges_amount = $request->hp_service_charges_amount ?? 0;

        $sale_inv_payment->hp_total_services_fees = $request->hp_total_services_fees ?? 0;
        $sale_inv_payment->customer_id = $customer_id;
        $sale_inv_payment->sales_invoice_id = $sale_invoice_id;

        // Total Principle And Interest
        $number_of_month = $request->hp_tenor ?? 0;
        $balance = $request->hp_loan_amount ?? 0;
        $interest_rate = $request->hp_interest_rate_percentage ?? 0;
        $monthly_payment = $request->hp_monthly_payment ?? 0;
        $TotalPrincipal = [];
        $TotalInterest = [];
        for ($month = 0; $month < $number_of_month; $month++) {
            $interest = ($balance * $interest_rate) / 1200;
            $principal = $monthly_payment - $interest;
            $balance -= $principal;

            $TotalPrincipal[] = $principal;
            $TotalInterest[] = $interest;
        }

        $PrincipalTotal = array_sum($TotalPrincipal);
        $InterestTotal = array_sum($TotalInterest);

        $sale_inv_payment->total_principle = $PrincipalTotal ?? 0;
        $sale_inv_payment->total_interest = $InterestTotal ?? 0;
        $sale_inv_payment->save();

        TemporarySalesItem::where('session_id', session()->getId())->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }



    public function getPrincipleInterest()
    {
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales_invoice = SalesInvoices::findOrFail($id);
        $sales_items = SalesItems::orderBy('id')->where('sales_invoice_id', $id)->get();
        $sales_invoices_payment = SalesInvoicesPayments::where('sales_invoice_id', $id)->first();
        return view('hp.sales_invoice.show', compact('sales_invoice', 'sales_items', 'sales_invoices_payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales_invoice = SalesInvoices::findOrFail($id);
        $sales_items_edits = SalesItems::orderBy('id')->where('sales_invoice_id', $id)->get();
        $sales_invoices_payment = SalesInvoicesPayments::where('sales_invoice_id', $id)->first();


        $session_id = session()->getId();
        $customers = Customers::orderBy('id')->where('dealer_or_hp', 'dealer')->get();
        $products = Products::all();
        $sales_persons = User::all();
        $temporary_sales_items = TemporarySalesItem::orderBy('id')->where('session_id', $session_id)->get();

        return view('hp.sales_invoice.edit', compact('customers', 'products', 'temporary_sales_items', 'sales_persons', 'sales_invoice', 'sales_items_edits', 'sales_invoices_payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHpSalesInvoices $request, $id)
    {
        $customer_edit_id = $request->customer_id;
        $customer = Customers::findOrFail($customer_edit_id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->dealer_customer_id = $request->dealer_customer_id;
        $customer->dealer_or_hp = $request->dealer_or_hp;
        $customer->update();
        $customer_id = $customer->id;

        $sale_invoice = SalesInvoices::findOrFail($id);
        $sale_invoice->customer_id = $customer_id;
        $sale_invoice->invoice_no = $request->invoice_no;
        $sale_invoice->invoice_date = $request->invoice_date;
        $sale_invoice->id_no = $request->id_no;
        $sale_invoice->showroom_name = $request->showroom_name;
        $sale_invoice->sales_type = $request->sales_type;
        $sale_invoice->payment_team = $request->payment_team;
        $sale_invoice->sales_persons_id = $request->sales_persons_id;
        $sale_invoice->delivery_date = $request->delivery_date;
        $sale_invoice->post_ref = $request->post_ref;
        $sale_invoice->user_id = auth()->user()->id ?? 0;
        $sale_invoice->hp_or_dealer = 'hp';
        $sale_invoice->update();
        $sale_invoice_id = $sale_invoice->id;


        if ($request->productFields) {
            foreach ($request->productFields as $key => $value) {
                $insert[$key]['product_id'] = $value['product_id'];
                $insert[$key]['qty'] = $value['qty'];
                $insert[$key]['unit_price'] = $value['price'];
                $insert[$key]['description'] = $value['description'];
                $insert[$key]['sales_invoice_id'] = $sale_invoice_id;
                $insert[$key]['sale_types'] = 'hp';
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
            SalesItems::insert($insert);
        }

        $sales_invoices_payment_id = $request->sales_invoices_payment_id;
        $sale_inv_payment = SalesInvoicesPayments::findOrFail($sales_invoices_payment_id);
        $sale_inv_payment->total_amount = $request->total_amount;
        $sale_inv_payment->down_payment = $request->down_payment;

        $sale_inv_payment->discount = 0; //$request->discount;
        $sale_inv_payment->dealer_ercentage = 0;  //$request->dealer_percentage;
        $sale_inv_payment->balance_to_be_pay = 0; //$request->balance_to_be_pay;
        $sale_inv_payment->balance_to_pay_be_date = 0; //$request->balance_to_pay_be_date;


        $sale_inv_payment->hp_loan_percentage = $request->hp_loan_percentage ?? 0;
        $sale_inv_payment->hp_loan_amount = $request->hp_loan_amount ?? 0;
        $sale_inv_payment->hp_interest_rate_percentage = $request->hp_interest_rate_percentage ?? 0;
        $sale_inv_payment->hp_commission_fees = $request->hp_commission_fees ?? 0;
        $sale_inv_payment->hp_tenor = $request->hp_tenor ?? 0;
        $sale_inv_payment->hp_account_opening = $request->hp_account_opening ?? 0;

        $sale_inv_payment->hp_stamp_duty = $request->hp_stamp_duty ?? 0;
        $sale_inv_payment->hp_stamp_duty_amount = $request->hp_stamp_duty_amount ?? 0;

        $sale_inv_payment->hp_insurance = $request->hp_insurance ?? 0;
        $sale_inv_payment->hp_insurance_amount = $request->hp_insurance_amount ?? 0;

        $sale_inv_payment->hp_document_fees = $request->hp_document_fees ?? 0;
        $sale_inv_payment->hp_commission = $request->hp_commission ?? 0;

        $sale_inv_payment->hp_total_downpayment = $request->hp_total_downpayment ?? 0;
        $sale_inv_payment->hp_monthly_payment = $request->hp_monthly_payment ?? 0;

        $sale_inv_payment->hp_service_charges = $request->hp_service_charges ?? 0;
        $sale_inv_payment->hp_service_charges_amount = $request->hp_service_charges_amount ?? 0;

        $sale_inv_payment->hp_total_services_fees = $request->hp_total_services_fees ?? 0;
        $sale_inv_payment->customer_id = $customer_id;
        $sale_inv_payment->sales_invoice_id = $sale_invoice_id;

        // Total Principle And Interest
        $number_of_month = $request->hp_tenor ?? 0;
        $balance = $request->hp_loan_amount ?? 0;
        $interest_rate = $request->hp_interest_rate_percentage ?? 0;
        $monthly_payment = $request->hp_monthly_payment ?? 0;
        $TotalPrincipal = [];
        $TotalInterest = [];
        for ($month = 0; $month < $number_of_month; $month++) {
            $interest = ($balance * $interest_rate) / 1200;
            $principal = $monthly_payment - $interest;
            $balance -= $principal;

            $TotalPrincipal[] = $principal;
            $TotalInterest[] = $interest;
        }

        $PrincipalTotal = array_sum($TotalPrincipal);
        $InterestTotal = array_sum($TotalInterest);

        $sale_inv_payment->total_principle = $PrincipalTotal ?? 0;
        $sale_inv_payment->total_interest = $InterestTotal ?? 0;
        $sale_inv_payment->update();


        TemporarySalesItem::where('session_id', session()->getId())->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hp_invoice_view($id)
    {
        $sales_invoice = SalesInvoices::findOrFail($id);
        $sales_items = SalesItems::orderBy('id')->where('sales_invoice_id', $id)->get();
        $sales_invoices_payment = SalesInvoicesPayments::where('sales_invoice_id', $id)->first();


        return view('hp.sales_invoice.invoice', compact('sales_invoice', 'sales_items', 'sales_invoices_payment'));
    }
}
