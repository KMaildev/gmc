<?php

namespace App\Http\Controllers\Reporting;

use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use App\JournalEntry;
use App\Models\JournalItem;
use App\Models\TempJournalEntry;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journal_entries = JournalEntry::all();
        return view('reporting.journal_entry.index', compact('journal_entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chartof_accounts = ChartofAccount::orderBy('coa_number', 'ASC')->get();
        return view('reporting.journal_entry.create', compact('chartof_accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $session_id = session()->getId();
        $temp_journal_entries = TempJournalEntry::where('session_id', $session_id)->get();
        $CountTotal = $temp_journal_entries->count();

        if ($CountTotal > 0) {
            $journal_entry = new JournalEntry();
            $journal_entry->entry_date = $request->entry_date;
            $journal_entry->title = $request->title;
            $journal_entry->user_id = auth()->user()->id ?? 0;
            $journal_entry->save();
            $journal_entry_id = $journal_entry->id;

            foreach ($temp_journal_entries as $key => $value) {
                $insert[$key]['journal_entrie_id'] = $journal_entry_id;
                $insert[$key]['entry_date'] = $request->entry_date;
                $insert[$key]['chartof_account_id'] = $value['chartof_account_id'];
                $insert[$key]['account_type_id'] = $value['account_type_id'];
                $insert[$key]['debit'] = $value['dr'];
                $insert[$key]['credit'] = $value['cr'];
                $insert[$key]['remark'] = $value['remark'];
                $insert[$key]['user_id'] = auth()->user()->id ?? 0;
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
            JournalItem::insert($insert);

            TempJournalEntry::where('session_id', session()->getId())->delete();
            return redirect()->back()->with('success', 'Your processing has been completed.');
        }
        return redirect()->back()->with('error', 'Something went wrong please try again.');
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
