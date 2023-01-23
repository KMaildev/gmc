<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHpPaymentFieldsToSalesInvoicesPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_invoices_payments', function (Blueprint $table) {
            $table->text('hp_loan_percentage')->nullable();
            $table->text('hp_loan_amount')->nullable();
            $table->text('hp_interest_rate_percentage')->nullable();
            $table->text('hp_commission_fees')->nullable();
            $table->text('hp_tenor')->nullable();
            $table->text('hp_account_opening')->nullable();
            $table->text('hp_document_fees')->nullable();
            $table->text('hp_stamp_duty')->nullable();
            $table->text('hp_insurance')->nullable();
            $table->text('hp_commission')->nullable();
            $table->text('hp_service_charges')->nullable();
            $table->text('hp_total_downpayment')->nullable();
            $table->text('hp_monthly_payment')->nullable();
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
