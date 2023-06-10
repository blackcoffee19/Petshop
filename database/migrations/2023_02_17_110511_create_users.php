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
                $table->string('phone',20)->nullable();
                $table->string('avatar')->nullable();
                $table->string('email')->unique();
                $table->enum('admin',[0,1,2])->default(0);
                $table->string('google_id')->nullable();
                $table->boolean('email_verified')->default(false);
                $table->string('email_verification_token',32)->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password')->nullable();
                $table->boolean('status')->default(true);
                $table->rememberToken();
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
