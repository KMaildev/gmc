<?php

namespace App\Exports;

use App\Accounting\CashBook;
use App\Accounting\ChartofAccount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CashBookExport implements FromView
{

    public function __construct($chartof_accounts, $cash_books, $beforeFirstDays)
    {
        $this->chartof_accounts = $chartof_accounts;
        $this->cash_books = $cash_books;
        $this->beforeFirstDays = $beforeFirstDays;
    }

    public function view(): View
    {
        return view('accounting.cash_book.export.index', [
            'chartof_accounts' => $this->chartof_accounts,
            'cash_books' => $this->cash_books,
            'beforeFirstDays' => $this->beforeFirstDays,
        ]);
    }
}
