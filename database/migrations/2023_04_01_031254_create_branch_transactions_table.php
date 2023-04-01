<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->integer('branch_account_id');
            $table->string('amount');
            $table->date('date');
            $table->text('details')->nullable();
            $table->string('code')->nullable();
            $table->integer('account_id');
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
        Schema::dropIfExists('branch_transactions');
    }
}
