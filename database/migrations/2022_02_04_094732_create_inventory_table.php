<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('description_html');

            $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('model_id')->unsigned();
            $table->unsignedBigInteger('manufacture_id')->unsigned();
            $table->unsignedBigInteger('status_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();

            $table->boolean('in_stock')->default(false);
            $table->timestamp('placed_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('model_id')->references('id')->on('models');
            $table->foreign('manufacture_id')->references('id')->on('manufacturers');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
