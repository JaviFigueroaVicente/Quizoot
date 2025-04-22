<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Formularios;
use App\Models\User;
use Tests\TestCase;

class FormulariosTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Obtener el usuario existente
        $this->user = User::where('email', 'admin@demo.com')->first();
        $this->assertNotNull($this->user, 'El usuario admin@demo.com no existe en la base de datos de pruebas.');

        // Crear una categoría con wd 1 en la base de datos de pruebas
        $this->categoria = Category::where('id', 1)->first();
    }

    public function test_store_formulario()
    {
        // Usar el usuario existente
        $user = $this->user;

        $formularioData = [
            'name' => 'test',
            'description' => 'test',
            'category_id' => [1], // Incluir solo la categoría con id 1
        ];

        $response = $this->actingAs($user)->postJson('api/formulario', $formularioData);

        $response->assertJson([
            'data' => [
                'name' => $formularioData['name'],
                'description' => $formularioData['description'],
                'user_id' => $user->id,
            ],
        ]);

        $this->assertDatabaseHas('formularios', [
            'name' => $formularioData['name'],
            'description' => $formularioData['description'],
            'user_id' => $user->id,
        ]);

        // Verificar que la categoría esté asociada correctamente
        $this->assertDatabaseHas('formularios_categorias', [
            'formulario_id' => $response->decodeResponseJson()['data']['id'],
            'categoria_id' => 1,
        ]);
    }

    public function test_update_formulario()
    {

    }

    public function test_delete_formulario()
    {
        // Crear un formulario en la base de datos de pruebas con la categoría con id 1
        $formulario = Formularios::where('name', 'test')->first();

        $this->assertNotNull($formulario);

        // Realizar la solicitud DELETE
        $response = $this->actingAs($this->user)->deleteJson("api/formulario/{$formulario->id}");


        $deletedFormulario = Formularios::where('name', 'test')->first();
        $this->assertNull($deletedFormulario);
    }
}
