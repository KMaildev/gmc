<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingChassisManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_chassis_management', function (Blueprint $table) {
            $table->increments('id');
            $table->text('product')->nullable();
            $table->text('type')->nullable();
            $table->text('model_no')->nullable();
            $table->text('model_year')->nullable();
            $table->text('configuration')->nullable();
            $table->text('body_color')->nullable();
            $table->text('interior_color')->nullable();
            $table->text('engine_power')->nullable();
            $table->text('chassis_no')->nullable();
            $table->text('engine_no')->nullable();
            $table->text('weight')->nullable();
            $table->text('door')->nullable();
            $table->text('seater')->nullable();
            $table->text('vehicle_no')->nullable();
            $table->text('quantity')->nullable();
            $table->text('remark')->nullable();
            $table->text('user_id')->nullable();

            $table->text('brand_name')->nullable();
            $table->text('commodity')->nullable();
            $table->text('id_no')->nullable();


            $table->integer('arrival_item_id')->nullable();
            $table->integer('purchase_item_id')->nullable();
            $table->integer('purchase_order_id')->nullable();
            $table->integer('arrival_information_id')->nullable();

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
        Schema::dropIfExists('shipping_chassis_management');
    }
}
