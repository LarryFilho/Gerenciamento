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
            $table->string('product_name');          
            $table->unsignedBigInteger('user_id');   
            $table->string('operation_type');
            $table->integer('quantity'); 
            $table->text('description')->nullable();  
            $table->timestamp('operation_date_time');  
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
