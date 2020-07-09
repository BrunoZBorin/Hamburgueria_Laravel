<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qtd');
            $table->enum('status', ['Ativo', 'Cancelado']);
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
            ->references('id')
            ->onDelete('cascade')
            ->on('products');
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')
            ->references('id')
            ->onDelete('cascade')
            ->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order__products');
    }
}
