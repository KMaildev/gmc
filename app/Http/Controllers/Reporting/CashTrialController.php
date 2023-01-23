<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashTrialController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->start_date ?? '2020-01-08';
        $end_date = $request->end_date ?? '2020-01-31';


        $previous_start_date = date("Y-m-d", strtotime("-1 month", strtotime($start_date)));
        $previous_end_date = date("Y-m-d", strtotime("last day of previous month", strtotime($end_date)));

        // Opening Balance Cash & Bank
        $opening_balance_cashs = ChartofAccount::with(['cash_books_table' => function ($query) use ($previous_start_date, $previous_end_date) {
            $query->whereDate('cash_book_date', '>=', $previous_start_date);
            $query->whereDate('cash_book_date', '<=', $previous_end_date);
            $query->where('cash_account_id', 1);
        }])->get();


        $opening_balance_banks = ChartofAccount::with(['cash_books_table' => function ($query) use ($previous_start_date, $previous_end_date) {
            $query->whereDate('cash_book_date', '>=', $previous_start_date);
            $query->whereDate('cash_book_date', '<=', $previous_end_date);
            $query->where('account_type_id', 2);
        }])->get();


        // Cash Trails Accounts 
        $cash_trials = ChartofAccount::with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
            $query->whereDate('cash_book_date', '>=', $start_date);
            $query->whereDate('cash_book_date', '<=', $end_date);
        }])->get();


        // Closing Balance Cash & Bank
        $closing_balance_cashs = ChartofAccount::with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
            $query->whereDate('cash_book_date', '>=', $start_date);
            $query->whereDate('cash_book_date', '<=', $end_date);
            $query->where('cash_account_id', 1);
        }])->get();


        $closing_balance_banks = ChartofAccount::with(['cash_books_table' => function ($query) use ($start_date, $end_date) {
            $query->whereDate('cash_book_date', '>=', $start_date);
            $query->whereDate('cash_book_date', '<=', $end_date);
            $query->where('account_type_id', 2);
        }])->get();

        return view('reporting.cash_trial.index', compact('opening_balance_cashs', 'opening_balance_banks', 'cash_trials', 'closing_balance_cashs', 'closing_balance_banks', 'start_date', 'end_date'));
    }
}
