<?php

namespace Tests\Unit;

use App\Models\Preguntas;
use App\Models\User;
use Tests\TestCase;

class PreguntaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
//    public function test_example(): void
//    {
//        $user = User::factory()->create();
//        $this->actingAs($user);
//
//        // Preparamos los datos para enviar en la solicitud POST
//        $preguntaData = [
//            'pregunta' => $this->faker->sentence,
//            'respuestas' => [
//                ['respuesta' => $this->faker->sentence, 'correcta' => true],
//                ['respuesta' => $this->faker->sentence, 'correcta' => false],
//                ['respuesta' => $this->faker->sentence, 'correcta' => false],
//                ['respuesta' => $this->faker->sentence, 'correcta' => false],
//            ],
//        ];
//
//        // Realizamos la solicitud POST
//        $response = $this->postJson(route('pregunta.store'), $preguntaData);
//
//        // Verificamos que la respuesta tenga el código 200 (creado)
//        $response->assertStatus(200);
//
//        // Verificamos que los datos de la pregunta se hayan guardado correctamente
//        $this->assertDatabaseHas('preguntas', [
//            'pregunta' => $preguntaData['pregunta'],
//            'user_id' => $user->id,
//        ]);
//
//        // Verificamos que las respuestas se hayan guardado correctamente
//        $storedPregunta = Preguntas::first();
//        $this->assertCount(count($preguntaData['respuestas']), $storedPregunta->respuestas);
//
//        foreach ($preguntaData['respuestas'] as $index => $respuestaData) {
//            $this->assertDatabaseHas('respuestas', [
//                'pregunta_id' => $storedPregunta->id,
//                'respuesta' => $respuestaData['respuesta'],
//                'correcta' => $respuestaData['correcta'],
//            ]);
//        }
//    }
}
