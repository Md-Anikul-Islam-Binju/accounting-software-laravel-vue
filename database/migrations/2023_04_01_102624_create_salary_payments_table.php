<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->integer('form_account_id')->nullable();
            $table->integer('to_employee_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('month')->nullable();
            $table->text('details')->nullable();
            $table->date('date')->nullable();
            $table->integer('salary_account_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('salary_payments');
    }
}
