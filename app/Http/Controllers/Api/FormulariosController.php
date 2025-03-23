<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormulariosResource;
use App\Models\Formularios;
use App\Models\Preguntas;
use App\Models\Respuestas;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormulariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formularios = Formularios::all();

        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => FormulariosResource::collection($formularios)
        ]);
    }

    public function userFormularios(){
        $user_id = auth()->id();
        $formularios = Formularios::where('user_id', $user_id)->get();

        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => FormulariosResource::collection($formularios),
        ]);
    }

    public function getPreguntasFormulario(string $id){
        $formulario = Formularios::with('preguntas.respuestas')->findOrFail($id);

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $formulario->preguntas
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $formulario = Formularios::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('thumbnail')) {
            $formulario->addMedia($request->file('thumbnail'))
                ->preservingOriginal()
                ->toMediaCollection('formularios');
        }

        $formulario->save();

        // Devolver una respuesta exitosa
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $formulario->load('media'),
        ]);

//        hay que usar una tabla intemedia y usar un sync
    }

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
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Formularios::with('user', 'media')->findOrFail($id);
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
    public function update(Request $request, Formularios $formulario)
    {
        try{
            // Validar los datos recibidos
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'description' => 'required|string',
                'thumbnail' => 'nullable|image|max:2048',
            ]);

            // Si la validación falla, devolver errores
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // Validar los datos y actualizar el formulario
            $data = $validator->validated();

            // Actualizar el formulario
            $formulario->update($data);

            // Manejar la subida de la imagen
            if ($request->hasFile('thumbnail')) {
                // Eliminar la imagen anterior si existe
                if ($formulario->media && $formulario->media->count() > 0) {
                    $formulario->media->first()->delete();
                }

                // Guardar la nueva imagen
                $formulario->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('formularios');
            }

            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => $formulario->load('media')
            ]);

        }catch (\Exception $e){
            // Capturar excepciones y devolver un error 500 con detalles
            return response()->json([
                'status' => 500,
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formularios $formulario)
    {
        $formulario->delete();
        return response()->noContent();
    }
}
