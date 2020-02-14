<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company')->unsigned();
            $table->foreign('company')->references('id')->on('companies');
            $table->bigInteger('service')->unsigned();
            $table->foreign('service')->references('id')->on('services');

            $table->string('benefits',124);
            
            $table->integer('tariff');

            $table->integer('points')->default(0);
            $table->enum('type',['private','company']);

            $table->bigInteger('department')->unsigned()->nullable();
            $table->foreign('department')->references('id')->on('departments');
            $table->bigInteger('municipality')->unsigned()->nullable();
            $table->foreign('municipality')->references('id')->on('municipalities');

            $table->boolean('highlighted')->default(0);
            $table->timestamp('highlighted_expiration')->nullable();

            $table->boolean('trash')->default(0);
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
        Schema::dropIfExists('offers');
    }
}
