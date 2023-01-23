<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\TempJournalEntry;
use Illuminate\Http\Request;

class TempJournalEntryController extends Controller
{
    public function index()
    {
        $session_id = session()->getId();
        $temp_journal_entries = TempJournalEntry::where('session_id', $session_id)->get();
        echo json_encode($temp_journal_entries);
    }

    public function store(Request $request)
    {
        $temp = new TempJournalEntry();
        $temp->chartof_account_id = $request->chartof_account_id;
        $temp->account_type_id = $request->account_type_id;
        $temp->ac_code = $request->ac_code;
        $temp->ac_head = $request->ac_head;
        $temp->ac_name = $request->ac_name;
        $temp->dr = $request->dr ?? 0;
        $temp->cr = $request->cr ?? 0;
        $temp->remark = $request->remark ?? '';
        $temp->session_id = session()->getId();
        $temp->save();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }

    public function remove_cart_temp_journal_entry($id)
    {
        $temp = TempJournalEntry::findOrFail($id);
        $temp->delete();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }
}
