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
        if(Schema::hasColumn('manufacturers', 'address')){
            Schema::dropColumns('manufacturers', ['address']);
        }

        Schema::table('manufacturers', function (Blueprint $table){
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('house_number')->nullable();
            $table->string('postcode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
