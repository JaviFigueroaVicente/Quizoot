<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormularioResource;
use App\Models\Formulario;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;


use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formularios = Formulario::all();

        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => FormularioResource::collection($formularios),
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
        $formulario = new Formulario();
        $formulario->id = $request->id;
        $formulario->name = $request->name;
        $formulario->description = $request->description;
        $formulario->user_id = $request->user_id;


        if ($request->hasFile('thumbnail')) {
            $formulario->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('formularios');
        }

        $formulario ->save();

        // Devolver una respuesta exitosa
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $formulario,
        ]);
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

    public function getFormulario($id)
    {
        return Formulario::with('user', 'media')->findOrFail($id);
    }
}
