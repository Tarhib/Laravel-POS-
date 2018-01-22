<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_no')->unsigned();
            $table->string('customer_name');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('unit_price')->unsigned();
            $table->integer('total_price')->unsigned();
            $table->integer('discount')->unsigned();
            $table->integer('grnd_price')->unsigned();
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
        Schema::dropIfExists('invoices');
    }
}
