<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('general_menu_menu_item', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('menu_item_id')->unsigned();

            $table->foreign('menu_id')
                ->references('id')->on('general_menus')
                ->onDelete('cascade');

            $table->foreign('menu_item_id')
                ->references('id')->on('general_menu_items')
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
        Schema::dropIfExists('general_menu_items');
        Schema::dropIfExists('general_menu_menu_item');
    }
}
