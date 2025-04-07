<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preguntas;

class PreguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $questions = [
            [
                'pregunta' => '¿Cuál es la capital de Francia?',
                'user_id' => 1,
            ],
            [
                'pregunta' => '¿Cuántos colores tiene el arcoíris?',
                'user_id' => 1,
            ],
            [
                'pregunta' => '¿Quién pintó la Mona Lisa?',
                'user_id' => 1,
            ],
        ];

        foreach ($questions as $q) {
            Preguntas::create($q);
        }
    }
}