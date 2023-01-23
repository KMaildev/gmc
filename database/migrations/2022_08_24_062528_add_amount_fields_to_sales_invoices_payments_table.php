<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountFieldsToSalesInvoicesPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_invoices_payments', function (Blueprint $table) {
            $table->text('hp_stamp_duty_amount')->nullable();
            $table->text('hp_insurance_amount')->nullable();
            $table->text('hp_service_charges_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_invoices_payments', function (Blueprint $table) {
            //
        });
    }
}
