<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formularios_preguntas', function (Blueprint $table) {
            $table->foreignId('formulario_id')->constrained('formularios')->onDelete('cascade');
            $table->foreignId('pregunta_id')->constrained('preguntas')->onDelete('cascade');
            $table->primary(['formulario_id', 'pregunta_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios_preguntas');
    }
};
