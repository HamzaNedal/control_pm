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
            //role

              $table->enum('role', ['admin', 'provider','client']);


            //client
            $table->string('phone')->nullable();
            $table->string('payment')->nullable();
            $table->integer('words')->nullable();

            //provider
             $table->string('payment_method')->nullable();
             $table->string('education_level')->nullable();
             $table->string('name_university')->nullable();
             $table->integer('years_experience')->nullable();
             $table->integer('capacity_day')->nullable();
             $table->string('subjects')->nullable();
             $table->string('country')->nullable();
             $table->string('whats_up')->nullable();


             $table->tinyInteger('delete')->default(0);
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
