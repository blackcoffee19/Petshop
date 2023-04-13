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
        Schema::create('debt', function (Blueprint $table) {
            $table->id('id_debt');
            $table->decimal('account_payable',8,2)->nullable();
            $table->decimal('unearned_revenues',8,2)->nullable();
            $table->decimal('tax',8,2)->default(3);
            $table->decimal('other_debt',8,2)->nullable();
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
        Schema::dropIfExists('debt');
    }
};
