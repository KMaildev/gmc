<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\CashBook;
use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrialController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->start_date ?? '2019-07-01';
        $end_date = $request->end_date ?? '2019-07-31';

        $previous_start_date = date("Y-m-d", strtotime("-1 month", strtotime($start_date)));
        $previous_end_date = date("Y-m-d", strtotime("last day of previous month", strtotime($end_date)));

        $trials = ChartofAccount::all();

        // Opening DR CR 
        $openings = DB::table('cash_books')->where(function ($query) use ($previous_start_date, $previous_end_date) {
            $query->where('cash_book_date', '>=', $previous_start_date);
            $query->where('cash_book_date', '<=', $previous_end_date);
        })->get();


        // Cash Trails Accounts 
        $cash_trials = DB::table('cash_books')->where(function ($query) use ($start_date, $end_date) {
            $query->where('cash_book_date', '>=', $start_date);
            $query->where('cash_book_date', '<=', $end_date);
        })->get();

        // Journal journal_items
        $journal_items = DB::table('journal_items')->where(function ($query) use ($start_date, $end_date) {
            $query->where('entry_date', '>=', $start_date);
            $query->where('entry_date', '<=', $end_date);
        })->get();


        return view('reporting.trial.index', compact('trials', 'openings', 'cash_trials', 'journal_items', 'start_date', 'end_date'));
    }
}
