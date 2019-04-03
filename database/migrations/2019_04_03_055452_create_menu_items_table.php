<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('menu_menu_item', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('menu_item_id')->unsigned();

            $table->foreign('menu_id')
                ->references('id')->on('menus')
                ->onDelete('cascade');

            $table->foreign('menu_item_id')
                ->references('id')->on('menu_items')
                ->onDelete('cascade');
                
            $table->primary(['menu_id','menu_item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
