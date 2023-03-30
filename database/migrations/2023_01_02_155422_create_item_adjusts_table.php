<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemAdjustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_adjusts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->integer('qty')->nullable();
            $table->string('rate');
            $table->string('sub_total')->nullable();
            $table->string('total')->nullable();
            $table->string('voucher')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('item_adjusts');
    }
}
