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
        if (Schema::hasColumn('inventory', 'status_id')){
            Schema::table('inventory', function (Blueprint $table){
                $table->dropForeign(['status_id']);
            });
            Schema::dropColumns('inventory', ['status_id']);
        }
        if (Schema::hasColumn('inventory', 'placed_at')){
            Schema::dropColumns('inventory', ['placed_at']);
        }
        if (Schema::hasColumn('inventory', 'slug')){
            Schema::dropColumns('inventory', ['slug']);
        }
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
