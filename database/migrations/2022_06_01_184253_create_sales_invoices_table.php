<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable();
            $table->text('id_no')->nullable();
            $table->text('invoice_no')->nullable();
            $table->text('invoice_date')->nullable();
            $table->text('showroom_name')->nullable();
            $table->text('sales_type')->nullable();
            $table->text('payment_team')->nullable();
            $table->integer('sales_persons_id')->nullable();
            $table->text('delivery_date')->nullable();
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
        Schema::dropIfExists('sales_invoices');
    }
}
