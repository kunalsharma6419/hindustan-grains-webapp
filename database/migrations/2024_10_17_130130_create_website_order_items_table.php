<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable()->index();
            $table->unsignedBigInteger('product_id')->nullable()->index();
            $table->unsignedBigInteger('product_quantity')->nullable()->index();
            $table->string('product_price')->nullable()->index();
            $table->string('total_price')->nullable()->index();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('website_orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('website_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_order_items');
    }
}
