<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleUnclaimedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_unclaimed', function (Blueprint $table) {
            $table->integer('sale_id')->unsigned();
            $table->integer('unclaimed_id')->unsigned();

            $table->foreign('sale_id')
                ->references('id')->on('sales')
                ->onDelete('cascade');
                
            $table->foreign('unclaimed_id')
                ->references('id')->on('unclaimeds')
                ->onDelete('cascade');

            $table->primary(['sale_id','unclaimed_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_unclaimed');
    }
}
