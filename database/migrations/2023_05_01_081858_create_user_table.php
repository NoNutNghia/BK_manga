<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nick_name');
            $table->string('full_name');
            $table->string('password');
            $table->tinyInteger('gender');
            $table->tinyInteger('user_status');
            $table->tinyInteger('role');
            $table->date('date_of_birth');
            $table->dateTime('email_verify_at')->nullable();
            $table->string('email_verify_token')->unique()->nullable();
            $table->dateTime('email_verify_token_expiry_at')->nullable();
            $table->string('reset_password_token')->nullable();
            $table->dateTime('reset_password_token_expiry_at')->nullable();
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
        Schema::dropIfExists('user');
    }
}
