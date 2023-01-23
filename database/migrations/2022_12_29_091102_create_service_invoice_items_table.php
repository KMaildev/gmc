<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_invoice_id')->nullable();
            $table->integer('spare_part_item_id')->nullable();
            $table->text('qty')->nullable();
            $table->text('unit_price')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('service_invoice_items');
    }
}
