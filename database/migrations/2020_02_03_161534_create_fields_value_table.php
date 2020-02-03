<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_value', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger("offer_id")->unsigned();
            $table->foreign("offer_id")->references("id")->on("offers");

            $table->bigInteger("field_id")->unsigned();
            $table->foreign("field_id")->references("id")->on("fields");

            $table->string("value");
            $table->timestamps();
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
        Schema::dropIfExists('fields_value');
    }
}
