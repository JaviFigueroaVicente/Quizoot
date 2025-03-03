<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Preguntas;
use App\Models\Respuestas;
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
        // Validar los datos de la pregunta
        $validator = Validator::make($request->all(), [
            'pregunta' => ['required', 'max:255'],
            'respuestas' => ['required', 'array', 'min:1'], // Al menos una respuesta
            'respuestas.*.respuesta' => ['required', 'string'], // Cada respuesta debe tener texto
            'respuestas.*.correcta' => ['required', 'boolean'], // Cada respuesta debe indicar si es correcta
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Crear la pregunta
        $data = $validator->validated();
        $pregunta = Preguntas::create(['pregunta' => $data['pregunta']]);

        // Preparar los datos de las respuestas
        $respuestasData = [];
        foreach ($data['respuestas'] as $respuesta) {
            $respuestasData[] = [
                'pregunta_id' => $pregunta->id,
                'respuesta' => $respuesta['respuesta'],
                'correcta' => $respuesta['correcta'],
            ];
        }

        // Crear las respuestas asociadas usando createMany
        Respuestas::insert($respuestasData); // Insertar todas las respuestas a la vez

        // Retornar la respuesta exitosa
        return response()->json([
            'status' => 201,
            'success' => true,
            'data' => $pregunta->load('respuestas'), // Incluir las respuestas asociadas
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
