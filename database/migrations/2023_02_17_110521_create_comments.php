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
        if(!Schema::hasTable('comments')){
            Schema::create('comments', function (Blueprint $table) {
                $table->id('id_comment');
                $table->foreignId('reply_comment')->nullable();
                $table->foreignId('id_product');
		        $table->foreignId('id_user')->nullable();
                $table->string('phone')->nullable();
		        $table->boolean('verified')->default(false);
		        $table->string('name',20)->nullable();
                $table->text('context')->nullable();
                $table->integer('rating')->nullable();
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
        Schema::dropIfExists('comments');
    }
};
