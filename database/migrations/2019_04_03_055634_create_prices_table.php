<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_item_id')->unsigned();
            $table->integer('car_type')->unsigned();
            $table->decimal('normal_price', 8, 2)->nullable();
            $table->decimal('member_price', 8, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('menu_item_price', function (Blueprint $table) {
            $table->integer('menu_item_id')->unsigned();
            $table->integer('price_id')->unsigned();

            $table->foreign('menu_item_id')
                ->references('id')->on('menu_items')
                ->onDelete('cascade');
                
            $table->foreign('price_id')
                ->references('id')->on('prices')
                ->onDelete('cascade');

            $table->primary(['menu_item_id','price_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
