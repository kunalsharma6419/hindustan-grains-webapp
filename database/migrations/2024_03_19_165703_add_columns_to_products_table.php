<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Add new columns
            $table->decimal('retailer_price', 10, 2)->nullable();
            $table->decimal('distributer_price', 10, 2)->nullable();
            $table->integer('packs_quantity')->nullable()->comment('Packs no');
            $table->integer('pack_ingredient_quantity')->nullable()->comment('In grams');

            // Remove existing column
            $table->dropColumn('selling_price');
            $table->dropColumn('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Add back the removed column
            $table->decimal('selling_price', 10, 2)->nullable();

            // Drop the newly added columns
            $table->dropColumn('retailer_price');
            $table->dropColumn('distributer_price');
            $table->dropColumn('packs_quantity');
            $table->dropColumn('pack_ingredient_quantity');
        });
    }
}