<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->unsignedBigInteger('promoter_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer_invoices')->onDelete('cascade'); 
            $table->foreign('invoice_id')->references('invoice_id')->on('product_invoices')->onDelete('cascade'); 
            $table->foreign('promoter_id')->references('id')->on('users')->onDelete('cascade');       
            $table->unsignedDecimal('amount_paid', 10, 2);
            $table->unsignedDecimal('grant_total', 10, 2);
            $table->string('payment_mode');
            $table->unsignedDecimal('amount_due', 10, 2);
            $table->unsignedDecimal('payment_percentage', 5, 2);
            $table->string('payment_proof')->nullable();
            $table->enum('payment_status', ['pending', 'initiated', 'half paid', 'fully paid']);
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
        Schema::dropIfExists('payment_statuses');
    }
}
