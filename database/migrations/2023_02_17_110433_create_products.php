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
                $table->decimal('weight',15,2)->nullable();
                $table->integer('age')->nullable();
                $table->double('per_price');
                $table->double('original_price');
                $table->double('sale')->nullable();
                $table->string('image')->nullable();
                $table->string('food')->nullable();
                $table->integer('quantity');
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
