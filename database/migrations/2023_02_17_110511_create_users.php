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
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->id('id_user');
                $table->string('name',40);
                $table->integer('gender')->nullable(true);
                $table->string('address',50)->nullable(true);
                $table->string('email')->unique();
                $table->date('dob')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password')->nullable();
                $table->string('google_id')->nullable();
                $table->string('phone_number')->nullable();
                $table->string('image')->nullable();
                $table->integer('admin')->nullable();
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
        Schema::dropIfExists('users');
    }
};