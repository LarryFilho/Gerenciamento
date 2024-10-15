<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');            // Nome do produto (agora apenas um texto)
            $table->unsignedBigInteger('user_id');    // Operador responsável
            $table->string('operation_type');          // Tipo de operação (carga ou descarga)
            $table->integer('quantity');                // Quantidade de itens
            $table->text('description')->nullable();   // Descrição do produto
            $table->timestamp('operation_date_time');  // Data e hora da operação
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
