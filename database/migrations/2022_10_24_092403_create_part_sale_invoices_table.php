<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_sale_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->text('customer_id')->nullable();
            $table->text('invoice_no')->nullable();
            $table->text('invoice_date')->nullable();
            $table->text('sales_type')->nullable();
            $table->text('showroom_name')->nullable();
            $table->text('invoice_remark')->nullable();
            $table->text('total_amount')->nullable();
            $table->text('tax')->nullable();
            $table->text('discount')->nullable();
            $table->integer('sales_persons_id')->nullable();
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
        Schema::dropIfExists('part_sale_invoices');
    }
}
