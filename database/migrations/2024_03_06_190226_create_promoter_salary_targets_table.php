<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoterSalaryTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoter_salary_targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promoter_id');
            $table->foreign('promoter_id')->references('id')->on('users');
            $table->unsignedDecimal('target_amount_received', 10, 2);
            $table->unsignedDecimal('target_amount', 10, 2);
            $table->unsignedDecimal('monthly_salary', 10, 2);
            $table->unsignedDecimal('monthly_salary_amount_to_paid', 10, 2);
            $table->unsignedDecimal('pending_percent', 10, 2);
            $table->unsignedDecimal('targetdiff', 10, 2);
            $table->string('month', 7);
            $table->unsignedDecimal('pending_target', 10, 2);
            $table->unsignedDecimal('previous_monthly_salary_amount_to_paid', 10, 2);
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
        Schema::dropIfExists('promoter_salary_targets');
    }
}
