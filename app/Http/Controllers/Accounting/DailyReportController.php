<?php

namespace App\Http\Controllers\Accounting;

use App\Accounting\CashBook;
use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cash_books = CashBook::orderBy('id', 'ASC')->get();

        if (request('from_date')) {
            $cash_books = CashBook::whereBetween('cash_book_date', [request('from_date'), request('from_date')])->get();

            // Closing Clash and Bank Balance
            $from_date = request('from_date');
            $beforeFirstDays = DB::table('cash_books')
                ->whereDate('cash_book_date', '<', $from_date)
                ->get();
        } else {
            $first_day = date('Y-m-d');
            $end_day = date('Y-m-d');
            $cash_books = CashBook::whereBetween('cash_book_date', [$first_day, $end_day])->get();

            // Closing Clash and Bank Balance
            $beforeFirstDays = DB::table('cash_books')
                ->whereDate('cash_book_date', '<', $first_day)
                ->get();
        }
        $date = $first_day ?? $from_date;
        return view('accounting.daily_report.index', compact('cash_books', 'beforeFirstDays', 'date'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
