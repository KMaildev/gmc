<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOperationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_operation_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('operation_date')->nullable();
            $table->text('particular')->nullable();
            $table->text('payment_operation')->nullable();
            $table->text('remark')->nullable();
            $table->text('operation_status')->nullable();
            $table->integer('purchase_order_id')->nullable();
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
        Schema::dropIfExists('purchase_operation_infos');
    }
}
