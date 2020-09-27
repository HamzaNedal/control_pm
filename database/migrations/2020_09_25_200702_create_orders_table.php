<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('provider_id')->nullable();

            $table->string('title');
            $table->integer('number_words');
            $table->text('information');

            $table->date('deadline');
            $table->date('added_date');
            $table->date('delivery_date')->nullable();
            $table->tinyInteger('status');
            $table->string('files');
            $table->string('files_provider');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('provider_id')->references('id')->on('users')->onDelete('cascade');;

        });
        DB::update("ALTER TABLE orders AUTO_INCREMENT = 1000000");


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
}
