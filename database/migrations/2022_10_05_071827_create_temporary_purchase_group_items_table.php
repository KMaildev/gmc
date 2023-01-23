<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryPurchaseGroupItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_purchase_group_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_order_id')->nullable();
            $table->integer('purchase_item_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('type_of_model_id')->nullable();
            $table->text('description')->nullable();
            $table->text('qty')->nullable();
            $table->text('cif_usd')->nullable();
            $table->text('session_id')->nullable();
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
        Schema::dropIfExists('temporary_purchase_group_items');
    }
}
