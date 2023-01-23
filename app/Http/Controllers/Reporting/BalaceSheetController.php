<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalaceSheetController extends Controller
{
    public function index(Request $request)
    {
        // non_current_assets is fixed assets 
        $non_current_assets = ChartofAccount::where('account_type_id', 6)
            ->get();

        // CURRENT ASSETS	
        $current_assets = ChartofAccount::where('account_classification_id', 1)
            ->whereNotIn('account_type_id', [6])
            ->get();

        $equities = ChartofAccount::where('account_classification_id', 2)
            ->get();

        $liabilities = ChartofAccount::where('account_classification_id', 11)
            ->get();

        return view('reporting.balace_sheet.index', compact('non_current_assets', 'current_assets', 'equities', 'liabilities'));
    }
}
