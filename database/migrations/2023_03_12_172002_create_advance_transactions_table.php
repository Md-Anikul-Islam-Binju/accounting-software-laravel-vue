<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_type');
            $table->integer('account_id');
            $table->integer('transaction_account_type');
            $table->string('amount')->nullable();
            $table->text('details')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('advance_transactions');
    }
}
