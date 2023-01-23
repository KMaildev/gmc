<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartofAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chartof_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coa_number')->unique();
            $table->string('description')->nullable();
            $table->integer('account_type_id')->nullable();
            $table->integer('account_classification_id')->nullable();
            $table->text('account_opening_balance')->nullable();
            $table->integer('chartof_account_id')->nullable();
            $table->text('sub_or_main_account')->nullable();
            $table->text('opening_balance_date')->nullable();
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
        // Schema::dropIfExists('chartof_accounts');
        Schema::table('chartof_accounts', function (Blueprint $table) {
            $table->dropColumn('coa_number', 'description', 'account_type_id');
        });
    }
}
