<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOperationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_operation_items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('particular_qty')->nullable();
            $table->text('payment_operation_amount')->nullable();
            $table->text('exchange_rate')->nullable();
            $table->integer('purchase_order_id')->nullable();
            $table->integer('purchase_operation_info_id')->nullable();
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
        Schema::dropIfExists('purchase_operation_items');
    }
}
