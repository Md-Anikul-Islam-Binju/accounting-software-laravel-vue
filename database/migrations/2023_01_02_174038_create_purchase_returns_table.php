<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('supplier_type');
            $table->string('supplier_name');
            $table->string('phone')->nullable();
            $table->text('address');
            $table->text('details')->nullable();
            $table->text('institution')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('rate')->nullable();
            $table->date('date')->nullable();
            $table->integer('voucher')->nullable();
            $table->string('total')->nullable();
            $table->string('discount')->nullable();
            $table->string('vat')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('grand_total')->nullable();
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
        Schema::dropIfExists('purchase_returns');
    }
}
