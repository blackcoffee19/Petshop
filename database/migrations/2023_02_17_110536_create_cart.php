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
        if(!Schema::hasTable('cart')){
            Schema::create('cart', function (Blueprint $table) {
                $table->id('id_cart');
                $table->string('order_code')->nullable();
                $table->foreignId('id_user')->nullable();
                $table->foreignId('id_product');
                $table->bigInteger('price')->nullable();
                $table->integer('sale')->nullable();
                $table->integer('amount');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
};
