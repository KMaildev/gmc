<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Exports\CustomersExport;
use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Imports\CustomerImport;
use App\Models\Customers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::where('dealer_or_hp', 'dealer')->get();
        if (request('search')) {
            $customers->where('name', 'Like', '%' . request('search') . '%');
        }
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customers::all();
        return view('customer.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer $request)
    {
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->company_name = $request->company_name;
        $customer->dealer_code = $request->dealer_code;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->description = $request->description;

        $customer->dealer_customer_id = $request->dealer_customer_id;
        $customer->dealer_or_hp = $request->dealer_or_hp;

        $customer->save();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        $customers = Customers::all();
        return view('customer.edit', compact('customer', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomer $request, $id)
    {
        $customer = Customers::findOrFail($id);
        $customer->name = $request->name;
        $customer->company_name = $request->company_name;
        $customer->dealer_code = $request->dealer_code;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->description = $request->description;

        $customer->dealer_customer_id = $request->dealer_customer_id;
        $customer->dealer_or_hp = $request->dealer_or_hp;

        $customer->update();
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
        $customer = Customers::findOrFail($id);
        $customer->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function dealer_customer_import()
    {
        Excel::import(new CustomerImport, request()->file('file'));
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function dealer_customer_export()
    {
        $customers = Customers::where('dealer_or_hp', 'dealer')->get();
        return Excel::download(new CustomersExport($customers), 'dealer_customers' . date("Y-m-d H:i:s") . '.xlsx');
    }


    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function get_customer_ajax($id)
    {
        $customers_data = Customers::findOrFail($id);
        return json_encode($customers_data);
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function get_dealer_customer_ajax($id)
    {
        $customers_data = Customers::findOrFail($id);
        return json_encode($customers_data);
    }
}
