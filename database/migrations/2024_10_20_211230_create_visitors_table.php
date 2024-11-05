<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->string('visitor_contact')->nullable();
            $table->string('visitor_document')->unique();
            $table->string('reason');
            $table->time('arrival')->nullable();
            $table->time('departure')->nullable();
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
