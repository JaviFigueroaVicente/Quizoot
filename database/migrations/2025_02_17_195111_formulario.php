<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('formulario', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('total_preguntas');
            $table->foreignId('id')->constrained('users');
            $table->foreignId('id')->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('formulario');
    }
};
