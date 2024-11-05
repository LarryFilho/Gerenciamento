<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id();
            $table->time("horario_chegada")->nullable();
            $table->text("informacoes_adicionais")->nullable();
            $table->string("dia");
            $table->string("mes");
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->timestamps();

         
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('encomendas', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Remove a chave estrangeira do user_id
        });

        Schema::dropIfExists('encomendas'); 
    }
};


