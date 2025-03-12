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
            'data' => FormulariosResource::collection($formularios),
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
    public function update(Formularios $formulario, StorePostRequest $request)
    {
        $formulario->update($request->validated());

        return new FormulariosResource($formulario);
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
