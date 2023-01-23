<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable();
            $table->text('vin_number')->nullable();
            $table->text('reg_number')->nullable();
            $table->text('invoice_date')->nullable();
            $table->text('invoice_no')->nullable();
            $table->text('time_in')->nullable();
            $table->text('time_out')->nullable();
            $table->integer('types_of_service_id')->nullable();
            $table->integer('sales_persons_id')->nullable();
            $table->text('sub_total')->nullable();
            $table->text('tax')->nullable();
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
        Schema::dropIfExists('service_invoices');
    }
}
