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
            $table->string('password');
            //client
            $table->string('Phone')->nullable();
            $table->string('Payment')->nullable();
            $table->integer('words')->nullable();

            //provider
             $table->string('payment_method')->nullable();
             $table->string('education_level')->nullable();
             $table->string('name_university')->nullable();
             $table->integer('years_experience')->nullable();
             $table->integer('capacity_day')->nullable();
             $table->string('subjects')->nullable();
             $table->string('country')->nullable();
             $table->string('Whats_up')->nullable();
            


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
