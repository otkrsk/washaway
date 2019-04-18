<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnclaimedPivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_unclaimed', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->integer('unclaimed_id')->unsigned();

            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');
                
            $table->foreign('unclaimed_id')
                ->references('id')->on('unclaimeds')
                ->onDelete('cascade');

            $table->primary(['customer_id','unclaimed_id']);
        });

        Schema::create('menu_item_unclaimed', function (Blueprint $table) {
            $table->integer('menu_item_id')->unsigned();
            $table->integer('unclaimed_id')->unsigned();

            $table->foreign('menu_item_id')
                ->references('id')->on('menu_items')
                ->onDelete('cascade');

            $table->foreign('unclaimed_id')
                ->references('id')->on('unclaimeds')
                ->onDelete('cascade');

            $table->primary(['menu_item_id','unclaimed_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unclaimed_pivot_tables');
    }
}
