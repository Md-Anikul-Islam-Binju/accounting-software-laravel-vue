<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('details')->nullable();
            $table->string('logo')->nullable();
            $table->string('invoice')->comment('1=A4,2=POS')->nullable();
            $table->string('currency')->nullable();
            $table->string('ware_house')->comment('1=Checked,2=Unchecked')->nullable();
            $table->string('serial_item')->comment('1=Checked,2=Unchecked')->nullable();
            $table->string('voucher_receipt')->comment('1=Checked,2=Unchecked')->nullable();
            $table->string('discount_value')->comment('1=On Voucher Total,2=On Individual Item')->nullable();
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
        Schema::dropIfExists('company_profiles');
    }
}
