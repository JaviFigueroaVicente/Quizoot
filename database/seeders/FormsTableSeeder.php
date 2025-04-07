<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formularios;

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
            ],
            [
                'name' => 'Formulario de Arte',
                'description' => 'Formulario para recoger opiniones sobre arte.',
                'user_id' => 1,
            ],
            [
                'name' => 'Formulario de Juegos',
                'description' => 'Formulario para analizar preferencias de juegos.',
                'user_id' => 1,
            ],
        ];

        foreach ($formularios as $formulario) {
            Formularios::create($formulario);
        }
    }
}