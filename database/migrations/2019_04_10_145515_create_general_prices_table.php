<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_item_id')->unsigned();
            $table->integer('car_type')->unsigned();
            $table->decimal('normal_price', 8, 2)->nullable();
            $table->decimal('member_price', 8, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('general_menu_item_general_price', function (Blueprint $table) {
            $table->integer('menu_item_id')->unsigned();
            $table->integer('price_id')->unsigned();

            $table->foreign('general_menu_item_id')
                ->references('id')->on('general_menu_items')
                ->onDelete('cascade');
                
            $table->foreign('general_price_id')
                ->references('id')->on('general_prices')
                ->onDelete('cascade');

            $table->primary(['general_menu_item_id','general_price_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_prices');
        Schema::dropIfExists('general_menu_item_general_price');
    }
}
