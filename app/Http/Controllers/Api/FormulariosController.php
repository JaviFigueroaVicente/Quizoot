<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormulariosResource;
use App\Models\Formularios;
use App\Models\Formularios_Respondidos;
use App\Models\Preguntas;
use App\Models\Respuestas;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FormulariosController extends Controller
{
    // Mostrar todos los formularios
    public function index(Request $request){
        $query = Formularios::with('categories')->withCount('preguntas', 'formulariosRespondidos');

        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category_id);
            });
        }

        $formularios = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => FormulariosResource::collection($formularios)
        ]);
    }


    // Mostrar todos los formularios del usuario log
    public function userFormularios(){
        $user_id = auth()->id();
        $formularios = Formularios::withCount('preguntas')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => FormulariosResource::collection($formularios),
        ]);
    }

    // Mostrar preguntas de un formulario
    public function getPreguntasFormulario(string $id){
        $formulario = Formularios::with('preguntas.respuestas')->findOrFail($id);

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $formulario->preguntas
        ]);
    }

    // Mostrar preguntas sin la respuesta
    public function getPreguntasSinRespuesta(string $id){
        $formulario = Formularios::with('preguntas.respuestas')->findOrFail($id);

        $preguntas = $formulario->preguntas->map(function ($pregunta) {
            return [
                'id' => $pregunta->id,
                'pregunta' => $pregunta->pregunta,
                'respuestas' => $pregunta->respuestas->pluck('respuesta'),
            ];
        });

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $preguntas
        ]);
    }

    // Mostrar ranking de un formulario
    public function getRankingFormulario(string $formularioId){
        $ranking = Formularios_Respondidos::with('user.media')->where('formulario_id', $formularioId)->orderBy('score', 'desc')->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $ranking
        ]);
    }

    // Verificar si la respuesta es correcta
    public function verificarRespuesta(Request $request)
    {
        $request->validate([
            'pregunta_id' => 'required|exists:preguntas,id',
            'respuesta' => 'required|string'
        ]);

        $pregunta = Preguntas::with('respuestas')->findOrFail($request->pregunta_id);

        $respuestaCorrecta = $pregunta->respuestas->firstWhere('correcta', true);

        if ($respuestaCorrecta && $respuestaCorrecta->respuesta === $request->respuesta) {
            return response()->json([
                'status' => 200,
                'success' => true,
                'es_correcta' => true
            ]);
        }

        return response()->json([
            'status' => 200,
            'success' => true,
            'es_correcta' => false
        ]);
    }
    //  Crear formulario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
        ]);

        $formulario = Formularios::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => auth()->id(),
        ]);

        // Asignar las categorías
        if (!empty($validated['category_id'])) {
            $formulario->categories()->sync($validated['category_id']);
        }

        if ($request->hasFile('thumbnail')) {
            $formulario->addMedia($request->file('thumbnail'))
                ->preservingOriginal()
                ->toMediaCollection('formularios');
        }

        return response()->json([
            'status' => 201,
            'success' => true,
            'data' => $formulario->load('media', 'categories'),
        ], 201);
    }

    // Asignar preguntas a un formulario
    public function asignarPreguntas(Request $request, $formulario_id){
        $request->validate([
            'pregunta_ids' => 'required|array',
            'pregunta_ids.*' => 'exists:preguntas,id',
        ]);

        $formulario = Formularios::findOrFail($formulario_id);
        $formulario->preguntas()->sync($request->pregunta_ids);

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $formulario->load('preguntas'),
        ]);
    }

    // Asignar categorías a un formulario
    public function asignarCategorias(Request $request, $formularioId){
        $request->validate([
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
        ]);

        $formulario = Formularios::findOrFail($formularioId);
        $formulario->categories()->sync($request->category_ids);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Categorías asignadas correctamente',
        ]);
    }

    // Mostrar categorias de un formulario
    public function getCategoriasFormulario($id){
        $formulario = Formularios::with('categories')->findOrFail($id);

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $formulario->categories,
        ]);
    }

    // Mostrar formulario
    public function show(string $id)
    {
        return Formularios::with('user', 'media', 'categories')->findOrFail($id);
    }

    // Actualizar formulario
    public function update(Request $request, Formularios $formulario){
        try {
            // Validar los datos recibidos
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'description' => 'required|string',
                'thumbnail' => 'nullable|image|max:2048',
                'category_id' => 'required|array',
                'category_id.*' => 'exists:categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = $validator->validated();

            // Actualizar los campos básicos del formulario
            $formulario->update([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);

            // Sincronizar las categorías
            if (!empty($data['category_id'])) {
                $formulario->categories()->sync($data['category_id']);
            } else {
                $formulario->categories()->detach(); // Si no hay categorías seleccionadas, eliminar todas
            }

            // Manejar la subida de la imagen
            if ($request->hasFile('thumbnail')) {
                if ($formulario->media && $formulario->media->count() > 0) {
                    $formulario->media->first()->delete();
                }

                $formulario->addMediaFromRequest('thumbnail')
                    ->preservingOriginal()
                    ->toMediaCollection('formularios');
            }

            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => $formulario->load('media', 'categories'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Eliminar formulario
    public function destroy(Formularios $formulario)
    {
        $formulario->delete();
        return response()->noContent();
    }
}
