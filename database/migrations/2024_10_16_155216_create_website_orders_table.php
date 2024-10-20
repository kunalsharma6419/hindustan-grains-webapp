<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('name')->nullable()->index();
            $table->string('phone')->nullable()->index();
            $table->longText('address')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('pincode')->nullable()->index();
            $table->string('state')->nullable()->index();
            $table->string('city')->nullable()->index();
            $table->string('status')->comment('0 for pending ,1 for success','2 for hold','3 for cancelled')
            ->default('0')->nullable()->index();
            $table->timestamp('order_date');
            $table->timestamp('order_time')->useCurrent();
            $table->string('tracking_no')->nullable()->index();
            $table->string('total_price')->nullable()->index();
            $table->integer('payment_mode')->comment('1 for online ,2 for COD')->default(2)->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_orders');
    }
}
