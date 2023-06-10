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
        Schema::create('banner', function (Blueprint $table) {
		    $table->id('id_banner');
		    $table->string('image');
		    $table->string('title',50);
		    $table->string('title_color',7)->default('#000000');
		    $table->string('content')->nullable();
		    $table->string('content_color',7)->nullable();
            $table->string('btn_content',20)->nullable();
            $table->string('btn_bg_color',7)->default('#000000');
            $table->string('btn_color',7)->default('#ffffff');
		    $table->string('link',20);
		    $table->string('attr',20)->nullable();
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
        Schema::dropIfExists('banner');
    }
};
