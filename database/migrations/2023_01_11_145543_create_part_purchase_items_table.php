<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartPurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_purchase_items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('part_purchase_id')->nullable();
            $table->text('spare_part_item_id')->nullable();
            $table->text('qty')->nullable();
            $table->text('unit_price')->nullable();
            $table->text('description')->nullable();
            $table->text('user_id')->nullable();
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
        Schema::dropIfExists('part_purchase_items');
    }
}
