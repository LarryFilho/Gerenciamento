<?php

// database/migrations/YYYY_MM_DD_create_comums_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Check if the table already exists
        if (!Schema::hasTable('comums')) {
            Schema::create('comums', function (Blueprint $table) {
                $table->id();
                $table->foreignId('area_id')->nullable()->constrained('areas')->onDelete('cascade');
                $table->foreignId('resident_id')->nullable()->constrained('residents')->onDelete('cascade');
                $table->foreignId('resident_apto')->nullable()->constrained('residents')->onDelete('cascade');
                $table->text('informacoes_adicionais')->nullable();
                $table->date('data')->nullable();
                $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('comums');
    }
};