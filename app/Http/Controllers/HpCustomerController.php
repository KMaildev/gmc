<?php

namespace App\Http\Controllers;

use App\Exports\HpCustomersExport;
use App\Http\Requests\StoreHpCustomer;
use App\Http\Requests\UpdateHpCustomer;
use App\Models\Customers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HpCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::where('dealer_or_hp', 'hp')->get();
        if (request('search')) {
            $customers->where('name', 'Like', '%' . request('search') . '%');
        }
        return view('hp_customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customers::where('dealer_or_hp', 'dealer')->get();
        return view('hp_customer.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHpCustomer $request)
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
        $dealer_customers = Customers::where('dealer_or_hp', 'dealer')->get();
        return view('hp_customer.edit', compact('customer', 'dealer_customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHpCustomer $request, $id)
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
        //
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function hp_customer_export()
    {
        $customers = Customers::where('dealer_or_hp', 'hp')->get();
        return Excel::download(new HpCustomersExport($customers), 'hp_customers' . date("Y-m-d H:i:s") . '.xlsx');
    }
}
