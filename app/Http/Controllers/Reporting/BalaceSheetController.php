<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalaceSheetController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->start_date ?? '2020-02-01';
        $end_date = $request->end_date ?? '2020-02-29';

        // Profit & Loss
        // revenues
        $revenues = ChartofAccount::where('account_type_id', 23)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->whereDate('cash_book_date', '>=', $start_date);
                $query->whereDate('cash_book_date', '<=', $end_date);
            }])->get();


        // Cost Of Sales 
        $cost_of_sales = ChartofAccount::where('account_type_id', 26)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->whereDate('cash_book_date', '>=', $start_date);
                $query->whereDate('cash_book_date', '<=', $end_date);
            }])->get();


        // Other Income 
        $other_incomes = ChartofAccount::where('account_type_id', 25)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->whereDate('cash_book_date', '>=', $start_date);
                $query->whereDate('cash_book_date', '<=', $end_date);
            }])->get();


        // Operations Expenses
        $operation_expenses = ChartofAccount::where('account_type_id', 27)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->whereDate('cash_book_date', '>=', $start_date);
                $query->whereDate('cash_book_date', '<=', $end_date);
            }])->get();

        // Administration Expenses
        $administration_expenses = ChartofAccount::where('account_type_id', 28)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->whereDate('cash_book_date', '>=', $start_date);
                $query->whereDate('cash_book_date', '<=', $end_date);
            }])->get();

        // Marketing Expenses
        $marketing_expenses = ChartofAccount::where('account_type_id', 29)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->whereDate('cash_book_date', '>=', $start_date);
                $query->whereDate('cash_book_date', '<=', $end_date);
            }])->get();

        // Finance Costs
        $finance_costs = ChartofAccount::where('account_type_id', 30)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->whereDate('cash_book_date', '>=', $start_date);
                $query->whereDate('cash_book_date', '<=', $end_date);
            }])->get();
        // Profit & Loss End 



        // non_current_assets is fixed assets 
        $non_current_assets = ChartofAccount::where('account_type_id', 6)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->where('cash_book_date', '>=', $start_date);
                $query->where('cash_book_date', '<=', $end_date);
            }])->get();

        // CURRENT ASSETS	
        $current_assets = ChartofAccount::where('account_classification_id', 1)
            ->whereNotIn('account_type_id', [6])
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->where('cash_book_date', '>=', $start_date);
                $query->where('cash_book_date', '<=', $end_date);
            }])->get();

        // equities
        $equities = ChartofAccount::where('account_classification_id', 2)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->where('cash_book_date', '>=', $start_date);
                $query->where('cash_book_date', '<=', $end_date);
            }])->get();

        // liabilities
        $liabilities = ChartofAccount::where('account_classification_id', 11)
            ->with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
                $query->where('cash_book_date', '>=', $start_date);
                $query->where('cash_book_date', '<=', $end_date);
            }])->get();

        return view('reporting.balace_sheet.index', compact('non_current_assets', 'current_assets', 'equities', 'liabilities', 'start_date', 'end_date'));
    }
}
