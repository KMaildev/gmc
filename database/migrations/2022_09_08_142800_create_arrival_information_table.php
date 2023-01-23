<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrivalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrival_information', function (Blueprint $table) {
            $table->increments('id');
            $table->text('arrival_date')->nullable();
            $table->text('remark')->nullable();
            $table->text('user_id')->nullable();
            $table->text('arrival_status')->nullable();
            $table->integer('purchase_order_id')->nullable();
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
        Schema::dropIfExists('arrival_information');
    }
}
