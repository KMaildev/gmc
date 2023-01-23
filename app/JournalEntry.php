<?php

namespace App;

use App\Models\JournalItem;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    public function journal_items_table()
    {
        return $this->hasMany(JournalItem::class, 'journal_entrie_id', 'id');
    }
}
