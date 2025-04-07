<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Respuestas;

class RespuestasTableSeeder extends Seeder
{
    public function run()
    {
        $respuestas = [
            // Para la pregunta con ID 1
            ['respuesta' => 'París', 'correcta' => 1, 'preguntas_id' => 1],
            ['respuesta' => 'Madrid', 'correcta' => 0, 'preguntas_id' => 1],
            ['respuesta' => 'Londres', 'correcta' => 0, 'preguntas_id' => 1],
            ['respuesta' => 'Roma', 'correcta' => 0, 'preguntas_id' => 1],

            // Para la pregunta con ID 2
            ['respuesta' => '7', 'correcta' => 1, 'preguntas_id' => 2],
            ['respuesta' => '5', 'correcta' => 0, 'preguntas_id' => 2],
            ['respuesta' => '6', 'correcta' => 0, 'preguntas_id' => 2],
            ['respuesta' => '8', 'correcta' => 0, 'preguntas_id' => 2],

            // Para la pregunta con ID 3
            ['respuesta' => 'Leonardo da Vinci', 'correcta' => 1, 'preguntas_id' => 3],
            ['respuesta' => 'Picasso', 'correcta' => 0, 'preguntas_id' => 3],
            ['respuesta' => 'Van Gogh', 'correcta' => 0, 'preguntas_id' => 3],
            ['respuesta' => 'Dalí', 'correcta' => 0, 'preguntas_id' => 3],
        ];

        foreach ($respuestas as $respuesta) {
            Respuestas::create($respuesta);
        }
    }
}