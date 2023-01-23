<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->text('supplier_id')->nullable();
            $table->text('invoice_no')->nullable();
            $table->text('invoice_date')->nullable();
            $table->text('invoice_remark')->nullable();
            $table->text('total_amount')->nullable();
            $table->integer('purchase_persons_id')->nullable();
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
        Schema::dropIfExists('part_purchases');
    }
}
