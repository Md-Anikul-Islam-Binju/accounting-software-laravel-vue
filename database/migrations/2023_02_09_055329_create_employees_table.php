<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('salary');
            $table->string('account_number');
            $table->string('account_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('nid')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('join_date');
            $table->integer('department_id');
            $table->integer('designation_id')->nullable();
            $table->string('target_amount');
            $table->string('commission')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('marital_status')->nullable();
            $table->string('employee_uniq_code')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('employees');
    }
}
