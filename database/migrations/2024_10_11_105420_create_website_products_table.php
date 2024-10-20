<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('product_name')->nullable()->index();
            $table->json('product_image_path')->nullable()->index();
            $table->json('quality_image_path')->nullable()->index();
            $table->integer('product_rating')->nullable()->index();
            $table->text('short_description')->nullable()->index();
            $table->longText('long_description')->nullable()->index();
            $table->string('product_quality')->nullable()->index();
            $table->integer('original_price')->nullable()->index();
            $table->integer('selling_price')->nullable()->index();
            $table->integer('discounted_price')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_products');
    }
}
