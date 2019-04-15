<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_item_sale', function (Blueprint $table) {
            $table->integer('sale_id')->unsigned();
            $table->integer('menu_item_id')->unsigned();

            $table->foreign('sale_id')
                ->references('id')->on('sales')
                ->onDelete('cascade');
                
            $table->foreign('menu_item_id')
                ->references('id')->on('menu_items')
                ->onDelete('cascade');

            $table->primary(['sale_id','menu_item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_item_sale');
    }
}
