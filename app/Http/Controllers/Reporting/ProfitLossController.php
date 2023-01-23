<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{

    public function index(Request $request)
    {
        // revenues
        $revenues = ChartofAccount::where('account_type_id', 23)
            ->get();

        // Cost Of Sales 
        $cost_of_sales = ChartofAccount::where('account_type_id', 26)
            ->get();

        // Other Income 
        $other_incomes = ChartofAccount::where('account_type_id', 25)
            ->get();

        // Operations Expenses
        $operation_expenses = ChartofAccount::where('account_type_id', 27)
            ->get();

        // Administration Expenses
        $administration_expenses = ChartofAccount::where('account_type_id', 28)
            ->get();

        // Marketing Expenses
        $marketing_expenses = ChartofAccount::where('account_type_id', 29)
            ->get();

        // Finance Costs
        $finance_costs = ChartofAccount::where('account_type_id', 30)
            ->get();

        return view('reporting.profit_loss.index', compact('revenues', 'cost_of_sales', 'other_incomes', 'operation_expenses', 'administration_expenses', 'marketing_expenses', 'finance_costs'));
    }
}
