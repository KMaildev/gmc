<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{

    public function index(Request $request)
    {

        $start_date = $request->start_date ?? '2020-01-01';
        $end_date = $request->end_date ?? '2020-01-31';

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



            
        return view('reporting.profit_loss.index', compact('revenues', 'cost_of_sales', 'other_incomes', 'operation_expenses', 'administration_expenses', 'marketing_expenses', 'finance_costs', 'start_date', 'end_date'));
    }
}
