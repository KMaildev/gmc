<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeOfModel;
use App\Models\Brand;
use App\Models\TypeOfModel;
use Illuminate\Http\Request;

class TypeOfModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_of_models = TypeOfModel::all();
        return view('accounting.type_of_model.index', compact('type_of_models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('accounting.type_of_model.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeOfModel $request)
    {
        $save = new TypeOfModel();
        $save->brand_id = $request->brand_id;
        $save->title = $request->title;
        $save->save();
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
        $brands = Brand::all();
        $type_of_model = TypeOfModel::findOrFail($id);
        return view('accounting.type_of_model.edit', compact('brands', 'type_of_model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeOfModel $request, $id)
    {
        $save = TypeOfModel::findOrFail($id);
        $save->brand_id = $request->brand_id;
        $save->title = $request->title;
        $save->update();
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
        $delete = TypeOfModel::findOrFail($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }


    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function get_type_of_models_ajax($id)
    {
        $type_of_models = TypeOfModel::get()->where('brand_id', $id);
        return json_encode($type_of_models);
    }
}
