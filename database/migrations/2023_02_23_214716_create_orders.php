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
        if(!Schema::hasTable('orders')){
            Schema::create('orders', function (Blueprint $table) {
                $table->id('id_order');
                $table->string('order_code');
                $table->foreignId('id_user')->nullable();
                $table->string('cus_name',40);
                $table->string('cus_address');
                $table->string('cus_phone',20);
                $table->string('cus_email',40);
                $table->enum('method',['credit','cod']);
                $table->string('image')->nullable();
                $table->enum('status',["Paid","Not yet"]);
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
        Schema::dropIfExists('orders');
    }
};
