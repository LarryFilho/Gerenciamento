<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{

    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('resident_name');
            $table->string('resident_document')->unique();
            $table->integer('apto');    
            $table->string('resident_contact');
            $table->string('address')->nullable();
            $table->date('move_in_date');
            $table->date('move_out_date')->nullable();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('residents');
    }
}
