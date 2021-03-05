<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('destination_country');
            $table->string('destination_city');
            $table->string('service_type');
            $table->string('tb_date')->nullable();
            $table->string('tb_time')->nullable();
            $table->string('pickup_location');
            $table->string('product_name');
            $table->integer('quantity');
            $table->string('consignment_no');
            $table->string('weights_id');
            $table->integer('product_value');
            $table->string('product_reference');
            $table->string('remarks');
            $table->boolean('collect_cash')->nullable();
            $table->string('status');
            $table->text('comment')->nullable();
            $table->text('return_advice')->nullable();
            $table->integer('return_advice_status')->default(0);
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
        Schema::dropIfExists('shipments');
    }
}
