<?php

namespace App\Http\Controllers;

use App\Accounting\ChartofAccount;
use App\Http\Requests\StoreProducts;
use App\Http\Requests\UpdateProducts;
use App\Imports\ProductsImport;
use App\Models\Brand;
use App\Models\Products;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProducts $request)
    {
        $user_id = auth()->user()->id;
        $product = new Products();
        $product->product = $request->product;
        $product->type = $request->type;
        $product->model_no = $request->model_no;
        $product->model_year = $request->model_year;
        $product->configuration = $request->configuration;
        $product->body_color = $request->body_color;
        $product->interior_color = $request->interior_color;
        $product->engine_power = $request->engine_power;
        $product->chessi_no = $request->chessi_no;
        $product->engine_no = $request->engine_no;
        $product->weight = $request->weight;
        $product->door = $request->door;
        $product->seater = $request->seater;
        $product->vehicle_no = $request->vehicle_no;
        $product->quantity = $request->quantity;
        $product->remark = $request->remark;
        $product->brand_id = $request->brand_id ?? 0;
        $product->user_id = $user_id ?? 0;
        $product->brand_name = $request->brand_name;
        $product->commodity = $request->commodity;
        $product->id_no = $request->id_no;
        $product->unit = $request->unit;
        $product->amount_usd = $request->amount_usd;
        $product->exchange_rate = $request->exchange_rate;
        $product->adjustment_value_ad = $request->adjustment_value_ad;
        $product->import_duty_other_tax_percent = $request->import_duty_other_tax_percent;
        $product->commercial_tax_percent = $request->commercial_tax_percent;
        $product->maccs_service_fee = $request->maccs_service_fee;
        $product->security_fee = $request->security_fee;
        $product->redemption_fine = $request->redemption_fine;
        $product->advance_tax_percent = $request->advance_tax_percent;

        $product->save();
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
        $product = Products::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $product = Products::findOrFail($id);
        return view('products.edit', compact('brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProducts $request, $id)
    {
        $user_id = auth()->user()->id;
        $product = Products::findOrFail($id);
        $product->product = $request->product;
        $product->type = $request->type;
        $product->model_no = $request->model_no;
        $product->model_year = $request->model_year;
        $product->configuration = $request->configuration;
        $product->body_color = $request->body_color;
        $product->interior_color = $request->interior_color;
        $product->engine_power = $request->engine_power;
        $product->chessi_no = $request->chessi_no;
        $product->engine_no = $request->engine_no;
        $product->weight = $request->weight;
        $product->door = $request->door;
        $product->seater = $request->seater;
        $product->vehicle_no = $request->vehicle_no;
        $product->quantity = $request->quantity;
        $product->remark = $request->remark;
        $product->brand_id = $request->brand_id ?? 0;
        $product->user_id = $user_id ?? 0;
        $product->brand_name = $request->brand_name;
        $product->commodity = $request->commodity;
        $product->id_no = $request->id_no;
        $product->unit = $request->unit;

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
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function product_import()
    {
        Excel::import(new ProductsImport, request()->file('file'));
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }


    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function get_products_ajax($id)
    {
        $product_data = Products::findOrFail($id);
        return json_encode($product_data);
    }
}
