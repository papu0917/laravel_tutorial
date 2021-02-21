<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStockFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_stock_fee', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('stock_id');
            $table->unsignedInteger('fee');
            $table->timestamps();

            $table->index('order_id');
            $table->index('stock_id');
            $table->index('fee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_stock_fee');
    }
}
