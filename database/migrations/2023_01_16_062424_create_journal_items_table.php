<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('entry_date')->nullable();
            $table->integer('chartof_account_id')->nullable();
            $table->integer('account_type_id')->nullable();
            $table->text('debit')->nullable();
            $table->text('credit')->nullable();
            $table->text('remark')->nullable();
            $table->text('user_id')->nullable();
            $table->text('journal_entrie_id')->nullable();
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
        Schema::dropIfExists('journal_items');
    }
}
