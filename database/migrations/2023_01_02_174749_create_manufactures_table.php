<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufactures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->integer('qty')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('voucher')->nullable();
            $table->date('date')->nullable();
            $table->string('total')->nullable();
            $table->string('details')->nullable();
            $table->string('lab_cost')->nullable();
            $table->string('other_cost')->nullable();
            $table->string('total_cost')->nullable();
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
        Schema::dropIfExists('manufactures');
    }
}
