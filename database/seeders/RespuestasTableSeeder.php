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
            ['respuesta' => 'París', 'correcta' => true, 'pregunta_id' => 1],
            ['respuesta' => 'Madrid', 'correcta' => false, 'pregunta_id' => 1],
            ['respuesta' => 'Londres', 'correcta' => false, 'pregunta_id' => 1],

            // Para la pregunta con ID 2
            ['respuesta' => '7', 'correcta' => true, 'pregunta_id' => 2],
            ['respuesta' => '5', 'correcta' => false, 'pregunta_id' => 2],

            // Para la pregunta con ID 3
            ['respuesta' => 'Leonardo da Vinci', 'correcta' => true, 'pregunta_id' => 3],
            ['respuesta' => 'Picasso', 'correcta' => false, 'pregunta_id' => 3],
        ];

        foreach ($respuestas as $respuesta) {
            Respuestas::create($respuesta);
        }
    }
}
