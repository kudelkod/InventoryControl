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
        Schema::create('model_parameter', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('model_id')->unsigned();
            $table->unsignedBigInteger('parameter_id')->unsigned();

            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('parameter_id')->references('id')->on('parameters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_parameter');
    }
};
