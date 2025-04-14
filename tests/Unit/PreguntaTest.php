<?php

namespace Tests\Unit;

use App\Models\Preguntas;
use App\Models\User;
use Tests\TestCase;

//class PreguntaTest extends TestCase
//{
//    public function test_create_pregunta()
//    {
//        // Crear un usuario en la base de datos
//        $user = User::where('email', 'admin@demo.com')->first();
//
//        // Datos para crear la pregunta
//        $preguntaData = [
//            'pregunta' => '¿Cuál es la capital de Francia?',
//            'respuestas' => [
//                ['respuesta' => 'París', 'correcta' => 1],
//                ['respuesta' => 'Madrid', 'correcta' => 0],
//                ['respuesta' => 'Berlín', 'correcta' => 0],
//                ['respuesta' => 'Lisboa', 'correcta' => 0],
//            ],
//            'user_id' => $user->id, // Incluir el user_id en los datos de la pregunta
//        ];
//
//        // Realizar una solicitud POST a la ruta /api/pregunta
//        $response = $this->postJson('api/pregunta', $preguntaData);
//
//        // Decodificar la respuesta JSON
//        $responseData = $response->decodeResponseJson();
//
//        // Verificar que la respuesta JSON contenga los datos esperados
//        $response->assertJson([
//            'data' => [
//                'pregunta' => '¿Cuál es la capital de Francia?',
//                'respuestas' => [
//                    ['respuesta' => 'París', 'correcta' => 1],
//                    ['respuesta' => 'Madrid', 'correcta' => 0],
//                    ['respuesta' => 'Berlín', 'correcta' => 0],
//                    ['respuesta' => 'Lisboa', 'correcta' => 0],
//                ],
//            ],
//        ]);
//
//        // Verificar que la pregunta se haya creado correctamente en la base de datos
//        $this->assertDatabaseHas('preguntas', [
//            'pregunta' => '¿Cuál es la capital de Francia?',
//            'user_id' => $user->id,
//        ]);
//
//        // Verificar que las respuestas se hayan creado correctamente en la base de datos
//        $this->assertDatabaseHas('respuestas', [
//            'pregunta_id' => $responseData['data']['id'],
//            'respuesta' => 'París',
//            'correcta' => true,
//        ]);
//
//        $this->assertDatabaseHas('respuestas', [
//            'pregunta_id' => $responseData['data']['id'],
//            'respuesta' => 'Madrid',
//            'correcta' => false,
//        ]);
//
//        $this->assertDatabaseHas('respuestas', [
//            'pregunta_id' => $responseData['data']['id'],
//            'respuesta' => 'Berlín',
//            'correcta' => false,
//        ]);
//
//        $this->assertDatabaseHas('respuestas', [
//            'pregunta_id' => $responseData['data']['id'],
//            'respuesta' => 'Lisboa',
//            'correcta' => false,
//        ]);
//    }
//}
