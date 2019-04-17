<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_sale', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->integer('sale_id')->unsigned();

            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');

            $table->foreign('sale_id')
                ->references('id')->on('sales')
                ->onDelete('cascade');
                
            $table->primary(['customer_id','sale_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_sale');
    }
}
