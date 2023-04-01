<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoubleEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('double_entries', function (Blueprint $table) {
            $table->id();
            $table->string('debit_amount')->nullable();
            $table->text('details')->nullable();
            $table->date('date')->nullable();
            $table->integer('account_id')->nullable();
            $table->string('credit_amount')->nullable();
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
        Schema::dropIfExists('double_entries');
    }
}
