<?php

namespace Tests\Unit;

use App\Models\Preguntas;
use App\Models\User;
use Tests\TestCase;

class PreguntaTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Obtener el usuario existente
        $this->user = User::where('email', 'admin@demo.com')->first();
        $this->assertNotNull($this->user, 'El usuario admin@demo.com no existe en la base de datos de pruebas.');
    }

    public function test_create_pregunta()
    {
        // Usar el usuario existente
        $user = $this->user;

        // Datos para crear la pregunta
        $preguntaData = [
            'pregunta' => '¿Cuál es la capital de Francia?',
            'respuestas' => [
                ['respuesta' => 'París', 'correcta' => 1],
                ['respuesta' => 'Madrid', 'correcta' => 0],
                ['respuesta' => 'Berlín', 'correcta' => 0],
                ['respuesta' => 'Lisboa', 'correcta' => 0],
            ],
        ];

        // Realizar una solicitud POST a la ruta /api/pregunta como el usuario
        $response = $this->actingAs($user)->postJson('api/pregunta', $preguntaData);


        // Verificar que la respuesta JSON contenga los datos esperados
        $response->assertJson([
            'data' => [
                'pregunta' => '¿Cuál es la capital de Francia?',
            ],
        ]);

        // Verificar que la pregunta se haya creado correctamente en la base de datos
        $this->assertDatabaseHas('preguntas', [
            'pregunta' => '¿Cuál es la capital de Francia?',

        ]);

        // Verificar que las respuestas se hayan creado correctamente en la base de datos
        $this->assertDatabaseHas('respuestas', [
            'respuesta' => 'París',
            'correcta' => true,
        ]);
    }

    public function test_delete_pregunta()
    {
        $pregunta = Preguntas::where('pregunta', '¿Cuál es la capital de Francia?')->first();

        $this->assertNotNull($pregunta);
        $pregunta->delete("api/pregunta/{$pregunta}", $pregunta);

        $deletedPreguntas = Preguntas::where('pregunta', '¿Cuál es la capital de Francia?')->first();
        $this->assertNull($deletedPreguntas);
    }
}
