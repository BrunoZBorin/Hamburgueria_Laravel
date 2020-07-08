<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('value',5,2);
            $table->date('datetime');
            $table->enum('status', ['Entregue', 'Produção', 'Pedido', 'Cancelado']);
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
            ->references('id')
            ->onDelete('cascade')
            ->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
