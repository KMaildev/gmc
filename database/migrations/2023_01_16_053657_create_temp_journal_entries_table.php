<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_journal_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->text('chartof_account_id')->nullable();
            $table->text('account_type_id')->nullable();
            $table->text('ac_head')->nullable();
            $table->text('ac_name')->nullable();
            $table->text('dr')->nullable();
            $table->text('cr')->nullable();
            $table->text('remark')->nullable();
            $table->text('session_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_journal_entries');
    }
}
