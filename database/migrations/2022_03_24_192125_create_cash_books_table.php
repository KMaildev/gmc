<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_books', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cash_book_date')->nullable();
            $table->text('month')->nullable();
            $table->text('year')->nullable();
            $table->text('iv_one')->nullable();
            $table->text('iv_two')->nullable();
            $table->integer('account_code_id'); //Chart Of Account ID
            $table->text('account_type_id');
            $table->text('description')->nullable();
            $table->integer('cash_account_id')->nullable(); //Chart Of Account ID
            $table->integer('bank_account')->nullable(); //Chart Of Account ID
            $table->text('cash_in')->nullable();
            $table->text('cash_out')->nullable();
            $table->text('bank_in')->nullable();
            $table->text('bank_out')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('cash_books');
    }
}
