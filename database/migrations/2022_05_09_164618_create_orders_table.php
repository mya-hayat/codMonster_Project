<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('order_number');
            $table->double('total_price');
            $table->double('sub_total');
            $table->double('total_discount');
            $table->string('note');
            $table->string('status')->default('No Answer');
            $table->foreignId('customerID')
                ->constrained('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('storeID')
                ->constrained('stores')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
