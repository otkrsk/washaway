<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTypeMenuItemPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_type_menu_item', function (Blueprint $table) {
            $table->integer('member_type_id')->unsigned();
            $table->integer('menu_item_id')->unsigned();

            $table->foreign('member_type_id')
                ->references('id')->on('member_types')
                ->onDelete('cascade');
                
            $table->foreign('menu_item_id')
                ->references('id')->on('menu_items')
                ->onDelete('cascade');

            $table->primary(['member_type_id','menu_item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_type_menu_item');
    }
}
