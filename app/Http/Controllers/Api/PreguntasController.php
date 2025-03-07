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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preguntas = Preguntas::all();
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $preguntas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Log::info('Datos recibidos:', $request->all());


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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
