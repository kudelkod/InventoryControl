<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_parameters', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inventory_id')->unsigned();
            $table->unsignedBigInteger('parameter_id')->unsigned();

            $table->foreign('inventory_id')->references('id')->on('inventory');
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
        Schema::dropIfExists('inventory_parameters');
    }
}
