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
            $table->boolean('correcta')->default(false);
            $table->foreignId('pregunta_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('respuesta');
    }
};
