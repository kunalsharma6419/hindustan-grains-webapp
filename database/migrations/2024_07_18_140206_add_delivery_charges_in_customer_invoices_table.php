<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryChargesInCustomerInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->decimal('delivery_charge', 10, 2)->nullable()->after('selling_price');
            $table->decimal('total_invoice_amount', 10, 2)->nullable()->after('delivery_charge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->dropColumn('delivery_charge');
            $table->dropColumn('total_invoice_amount');
        });
    }
}
