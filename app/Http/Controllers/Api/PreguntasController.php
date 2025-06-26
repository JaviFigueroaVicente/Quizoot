<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Preguntas;
use App\Models\Respuestas;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    // Mostrar todas las preguntas
    public function index()
    {
        $preguntas = Preguntas::all();
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $preguntas
        ]);
    }

    // Mostrar preguntas de un usuario
    public function userPreguntas()
    {
        $user_id = auth()->id();
        $preguntas = Preguntas::where('user_id', $user_id)->with('respuestas')->orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $preguntas
        ]);
    }

    // Crear una pregunta
    public function store(Request $request)
    {
        try {

            $request->validate([
                'pregunta' => 'required|string|max:255',
                'respuestas' => 'required|array|min:2|max:4',
                'respuestas.*.respuesta' => 'required|string|max:255',
                'respuestas.*.correcta' => 'boolean',
            ]);


            // Crear la pregunta
            $pregunta = Preguntas::create([
                'pregunta' => $request->pregunta,
                'user_id' => auth()->id(),
            ]);

            // Crear respuestas asociadas
            $pregunta->respuestas()->createMany($request->respuestas);

            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => $pregunta->load('respuestas'),
            ]);
        } catch (\Exception $e) {
            Log::error('Error en store(): ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Error interno en el servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Mostrar una pregunta
    public function show(string $id)
    {
        return Preguntas::with('user', 'respuestas')->findOrFail($id);
    }
    // Actualizar una pregunta
    public function update(Request $request, Preguntas $pregunta)
    {
        try {
            // Validar los datos recibidos
            $validator = Validator::make($request->all(), [
                'pregunta' => 'required|string|max:255',
                'respuestas' => 'required|array|min:2|max:4',
                'respuestas.*.id' => 'required|exists:respuestas,id',
                'respuestas.*.respuesta' => 'required|string|max:255',
                'respuestas.*.correcta' => 'boolean',
            ]);

            // Si la validación falla, devolver errores
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // Validar los datos y actualizar el usuario
            $data = $validator->validated();
            $pregunta->update(['pregunta' => $data['pregunta']]);

            // Actualizar las respuestas
            foreach ($data['respuestas'] as $respuestaData) {
                // Buscar la respuesta por su ID
                $respuesta = Respuestas::find($respuestaData['id']);
                if ($respuesta) {
                    // Actualizar los datos de la respuesta
                    $respuesta->update([
                        'respuesta' => $respuestaData['respuesta'],
                        'correcta' => $respuestaData['correcta'],
                    ]);
                }
            }

            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => $pregunta->load('respuestas')
            ]);
        } catch (\Exception $e) {
            // Capturar excepciones y devolver un error 500 con detalles
            return response()->json([
                'status' => 500,
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Eliminar una pregunta
    public function destroy(Preguntas $pregunta)
    {
        $pregunta->delete();
        return response()->noContent();
    }
}
