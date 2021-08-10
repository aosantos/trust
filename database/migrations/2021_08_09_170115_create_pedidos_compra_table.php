<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientes_id');
            $table->foreignId('produtos_id');
            $table->decimal('valor_total');
            $table->string('status');
            $table->foreign('clientes_id')
                ->references('id')->on('clientes');
            $table->foreign('produtos_id')
                ->references('id')->on('produtos');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos_compra');
    }
}
