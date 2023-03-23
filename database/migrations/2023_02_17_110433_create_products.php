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
        if(! Schema::hasTable('products')){
            Schema::create('products', function (Blueprint $table) {
                $table->id('id_product');
                $table->string('product_name',40);
                $table->foreignId('id_breed');
                $table->string('status',20);
                $table->integer('gender')->nullable();
                $table->decimal('weight',15,3)->nullable();
                $table->integer('age')->nullable();
                $table->integer('sold');
                $table->integer('quantity');
                $table->double('per_price');
                $table->double('sale')->nullable();
                $table->string('image')->nullable();
                $table->string('food')->nullable();
                $table->integer('rating')->nullable();
                $table->longText('description')->nullable();
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
        Schema::dropIfExists('products');
    }
};
