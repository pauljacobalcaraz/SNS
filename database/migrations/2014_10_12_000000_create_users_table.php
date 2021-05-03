<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('street')->nullable();
            $table->string('city_town')->nullable();
            $table->string('province')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('qrcode')->nullable();
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('restrict')->onUpdate('cascade')->nullable();
            // $table->integer('role_id');
            // $table->integer('status_id');
            $table->foreignId('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('cascade')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
}
