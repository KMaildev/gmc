<?php

namespace App\Http\Controllers\Accounting;

use App\Accounting\AccountType;
use App\Accounting\ChartofAccount;
use App\Accounting\SubAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubAccount;
use App\Http\Requests\UpdateSubAccount;
use Illuminate\Http\Request;

class SubAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chartof_accounts = ChartofAccount::orderBy('chartof_account_id')->where('sub_or_main_account', 'sub_account')->get();
        return view('accounting.sub_account.index', compact('chartof_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_types = AccountType::all();
        $chartof_accounts = ChartofAccount::all();
        return view('accounting.sub_account.create', compact('account_types', 'chartof_accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubAccount $request)
    {
        $Coa = new ChartofAccount();
        $Coa->account_type_id = $request->account_type;
        $Coa->account_classification_id = $request->account_classification_id;
        $Coa->description = $request->description;
        $Coa->account_opening_balance = $request->opening_balance ?? 0;
        $Coa->opening_balance_date = $request->opening_balance_date ?? '';
        $Coa->coa_number = $request->sub_account_number;
        $Coa->chartof_account_id = $request->main_account_code;
        $Coa->sub_or_main_account = 'sub_account';

        $Coa->save();
        return redirect()->route('subaccount.create')
            ->with('success', 'Created successfully.');
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
        $chartof_accounts = ChartofAccount::all();
        $edit = ChartofAccount::findOrFail($id);
        return view('accounting.sub_account.edit', compact('chartof_accounts', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubAccount $request, $id)
    {
        $Coa = ChartofAccount::findOrFail($id);
        $Coa->account_type_id = $request->account_type;
        $Coa->account_classification_id = $request->account_classification_id;
        $Coa->description = $request->description;
        $Coa->account_opening_balance = $request->opening_balance ?? 0;
        $Coa->opening_balance_date = $request->opening_balance_date ?? '';
        $Coa->coa_number = $request->sub_account_number;
        $Coa->chartof_account_id = $request->main_account_code;
        $Coa->sub_or_main_account = 'sub_account';
        $Coa->update();
        return redirect()->back()->with('success', 'Updated successfully.');
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
