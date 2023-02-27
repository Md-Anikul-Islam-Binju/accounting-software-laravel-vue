<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code')->nullable();
            $table->string('item_name');
            $table->string('item_barcode')->nullable();
            $table->integer('group_id');
            $table->integer('category_id');
            $table->integer('unit_id');
            $table->integer('item_type')->nullable();
            $table->text('details')->nullable();
            $table->integer('minimum_sale_qty')->nullable();
            $table->string('minimum_sale_rate')->nullable();
            $table->string('purchases_rate')->nullable();
            $table->string('default_sale_rate')->nullable();
            $table->string('wholesale_rate')->nullable();
            $table->string('retailer_rate')->nullable();
            $table->string('corporate_rate')->nullable();
            $table->string('distributor_rate')->nullable();
            $table->string('discount_rate')->nullable();
            $table->string('vat')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('items');
    }
}
