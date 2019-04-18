<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnclaimedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unclaimeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('menu_item_id');
            $table->integer('quantity');
            $table->boolean('is_unclaimed');
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
        Schema::dropIfExists('unclaimeds');
    }
}
