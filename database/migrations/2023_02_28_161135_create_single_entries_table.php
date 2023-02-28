<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('form_account_id');
            $table->integer('to_account_id');
            $table->date('entry_date');
            $table->string('transaction_amount');
            $table->text('details')->nullable();
            $table->string('single_entry_code')->nullable();
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
        Schema::dropIfExists('single_entries');
    }
}
