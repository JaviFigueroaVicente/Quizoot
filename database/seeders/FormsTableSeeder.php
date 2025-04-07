<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formularios;
use Illuminate\Support\Facades\DB;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formularios = [
            [
                'name' => 'Formulario de Matemáticas',
                'description' => 'Formulario para evaluar conocimientos de matemáticas.',
                'user_id' => 1,
                'preguntas' => [1, 2, 3]
            ],
            [
                'name' => 'Formulario de Arte',
                'description' => 'Formulario para recoger opiniones sobre arte.',
                'user_id' => 1,
                'preguntas' => [1, 2, 3]
            ],
            [
                'name' => 'Formulario de Juegos',
                'description' => 'Formulario para analizar preferencias de juegos.',
                'user_id' => 1,
                'preguntas' => [1, 2, 3]
            ],
        ];

        foreach ($formularios as $formulario) {
            $form = Formularios::create([
                'name' => $formulario['name'],
                'description' => $formulario['description'],
                'user_id' => $formulario['user_id'],
            ]);

            foreach ($formulario['preguntas'] as $preguntaId) {
                DB::table('formularios_preguntas')->insert([
                    'formulario_id' => $form->id,
                    'pregunta_id' => $preguntaId,
                ]);
            }
        }
    }
}