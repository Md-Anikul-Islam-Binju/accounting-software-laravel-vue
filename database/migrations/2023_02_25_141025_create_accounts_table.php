<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_code');
            $table->string('account_name');
            $table->integer('account_type');
            $table->string('account_balance')->nullable();
            $table->date('account_open_date');
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_branch')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('email')->nullable();
            $table->string('credit_limit')->nullable();
            $table->integer('party_type')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
