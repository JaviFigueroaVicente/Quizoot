<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formularios;
use Illuminate\Support\Facades\DB;

class FormsTableSeeder extends Seeder
{
    public function run()
    {
        $formularios = [
            // CIENCIA
            [
                'name' => 'Formulario de Ciencia 1',
                'description' => 'Evalúa conocimientos básicos de ciencia.',
                'user_id' => 1,
                'categoria_id' => 1,
                'preguntas' => range(1, 10),
            ],
            [
                'name' => 'Formulario de Ciencia 2',
                'description' => 'Evalúa conocimientos adicionales de ciencia.',
                'user_id' => 1,
                'categoria_id' => 1,
                'preguntas' => range(11, 20),
            ],

            // EDUCACIÓN
            [
                'name' => 'Formulario de Educación 1',
                'description' => 'Evalúa conocimientos básicos en educación general.',
                'user_id' => 1,
                'categoria_id' => 2,
                'preguntas' => range(21, 30),
            ],
            [
                'name' => 'Formulario de Educación 2',
                'description' => 'Evalúa conocimientos adicionales en educación general.',
                'user_id' => 1,
                'categoria_id' => 2,
                'preguntas' => range(31, 40),
            ],

            // ALIMENTACIÓN
            [
                'name' => 'Formulario de Alimentación 1',
                'description' => 'Evalúa conocimientos sobre alimentación.',
                'user_id' => 1,
                'categoria_id' => 3,
                'preguntas' => range(41, 50),
            ],
            [
                'name' => 'Formulario de Alimentación 2',
                'description' => 'Evalúa conocimientos complementarios sobre alimentación.',
                'user_id' => 1,
                'categoria_id' => 3,
                'preguntas' => range(51, 60),
            ],

            // PROGRAMACIÓN
            [
                'name' => 'Formulario de Programación 1',
                'description' => 'Evalúa conocimientos sobre fundamentos de programación.',
                'user_id' => 1,
                'categoria_id' => 4,
                'preguntas' => range(61, 70),
            ],
            [
                'name' => 'Formulario de Programación 2',
                'description' => 'Evalúa conocimientos más avanzados de programación.',
                'user_id' => 1,
                'categoria_id' => 4,
                'preguntas' => range(71, 80),
            ],

            // JUEGOS
            [
                'name' => 'Formulario de Juegos 1',
                'description' => 'Evalúa conocimientos sobre videojuegos populares.',
                'user_id' => 1,
                'categoria_id' => 5,
                'preguntas' => range(81, 90),
            ],
            [
                'name' => 'Formulario de Juegos 2',
                'description' => 'Evalúa conocimientos complementarios sobre videojuegos.',
                'user_id' => 1,
                'categoria_id' => 5,
                'preguntas' => range(91, 100),
            ],

            // ANIMACIÓN
            [
                'name' => 'Formulario de Animación 1',
                'description' => 'Evalúa conocimientos sobre películas y series animadas.',
                'user_id' => 1,
                'categoria_id' => 6,
                'preguntas' => range(101, 110),
            ],
            [
                'name' => 'Formulario de Animación 2',
                'description' => 'Evalúa conocimientos adicionales sobre animación.',
                'user_id' => 1,
                'categoria_id' => 6,
                'preguntas' => range(111, 120),
            ],
        ];

        foreach ($formularios as $formulario) {
            $form = Formularios::create([
                'name' => $formulario['name'],
                'description' => $formulario['description'],
                'user_id' => $formulario['user_id'],
            ]);

            // Insertar preguntas relacionadas
            foreach ($formulario['preguntas'] as $preguntaId) {
                DB::table('formularios_preguntas')->insert([
                    'formulario_id' => $form->id,
                    'pregunta_id' => $preguntaId,
                ]);
            }

            // Insertar categoría relacionada
            DB::table('formularios_categorias')->insert([
                'formulario_id' => $form->id,
                'categoria_id' => $formulario['categoria_id'],
            ]);
        }
    }
}