<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateImportCar;
use App\Models\Products;
use Illuminate\Http\Request;

class ImportCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderBy('id')->get()->groupBy(function ($data) {
            return  $data->commodity . 'explode_id_commodity' . $data->id_no;
        });
        $form_status = 'is_create';
        // return $products;
        return view('accounting.import_car.index', compact('products', 'form_status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $product_edit = Products::findOrFail($id);
        $form_status = 'is_edit';
        $products = Products::orderBy('id')->get()->groupBy(function ($data) {
            return $data->id_no . 'explode_id_commodity' . $data->commodity;
        });
        return view('accounting.import_car.index', compact('products', 'product_edit', 'form_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImportCar $request, $id)
    {
        $user_id = auth()->user()->id;
        $product = Products::findOrFail($id);

        $product->user_id = $user_id ?? 0;

        $product->commodity = $request->commodity;
        $product->id_no = $request->id_no;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->amount_usd = $request->amount_usd;
        $product->exchange_rate = $request->exchange_rate;
        $product->adjustment_value_ad = $request->adjustment_value_ad;
        $product->import_duty_other_tax_percent = $request->import_duty_other_tax_percent;
        $product->commercial_tax_percent = $request->commercial_tax_percent;
        $product->maccs_service_fee = $request->maccs_service_fee;
        $product->security_fee = $request->security_fee;
        $product->redemption_fine = $request->redemption_fine;
        $product->advance_tax_percent = $request->advance_tax_percent;
        $product->update();
        return redirect('import_car')->with('success', 'Your processing has been completed.');
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
}
