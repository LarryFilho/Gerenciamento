<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('occurrences', function (Blueprint $table) {
            $table->id();
            $table->date('occurrence_date')->nullable();
            $table->time('occurrence_time')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('resident_id')->nullable()->constrained('residents')->onDelete('cascade');
            $table->boolean('resolved')->default(false);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('occurrences');
    }
};
