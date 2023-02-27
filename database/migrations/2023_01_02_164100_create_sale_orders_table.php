<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('customer_type');
            $table->string('customer_name');
            $table->string('company_name');
            $table->string('phone')->nullable();
            $table->text('address');
            $table->text('details')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('voucher')->nullable();
            $table->date('date')->nullable();
            $table->string('total')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('vat')->nullable();
            $table->string('transport_cost')->nullable();
            $table->string('paid')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('order_number')->nullable();
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
        Schema::dropIfExists('sale_orders');
    }
}
