<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promoter_id');     
            $table->foreign('promoter_id')->references('id')->on('users');
            $table->string('invoice_id');     
            $table->foreign('invoice_id')->references('invoice_id')->on('product_invoices');
            $table->string('name');
            $table->string('phone_number');
            $table->string('gst_number');
            $table->string('full_address');
            $table->softDeletes();                          
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
        Schema::dropIfExists('customer_invoices');
    }
}
