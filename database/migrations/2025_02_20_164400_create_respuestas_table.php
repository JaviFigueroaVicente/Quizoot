<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('respuesta', function (Blueprint $table) {
            $table->id();
            $table->string('respuesta');
            $table->tinyInteger('correcta');
            $table->foreignId('pregunta_id')->constrained('preguntas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('respuesta');
    }
};
