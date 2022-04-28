<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')
                ->references('id')
                ->on('owners');
            $table->unsignedBigInteger('car_id')->nullable();
            $table->foreign('car_id')
                ->references('id')
                ->on('cars');
            $table->string('services');
            $table->float('total_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('owners');
            Schema::dropIfExists('transactions');
        });
    }
}
