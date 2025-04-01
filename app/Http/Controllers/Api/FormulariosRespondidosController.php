<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Formularios_Respondidos;
use App\Models\Formularios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormulariosRespondidosController extends Controller
{
    public function index()
    {
        $formularios_respondidos = Formularios_Respondidos::all();

        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $formularios_respondidos
        ]);
    }

    public function create()
    {
     //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required',
            'formulario_id' => 'required|exists:formularios,id',
        ]);

        $formulario_respondido = Formularios_Respondidos::create([
            'score' => $validated['score'],
            'user_id' => auth()->id(),
            'formulario_id' => $validated['formulario_id'],
        ]);

        return response()->json([
            'status' => 201,
            'success' => true,
            'data' => $formulario_respondido,
        ]);
    }


    public function show(string $formularioId, string $userId)
    {
        return Formularios_Respondidos::where('user_id', $userId)->where('formulario_id', $formularioId)->first();
    }



    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, Formularios_Respondidos $formularios_Respondidos)
    {
        $validator = Validator::make($request->all(), [
            'score' => 'required',
            'formulario_id' => 'required|exists:formularios,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        $formularios_Respondidos->update($data);
        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $formularios_Respondidos,
        ]);
    }

    public function destroy(string $formularioId, string $userId)
    {
        $formulario = Formularios_Respondidos::where('user_id', $userId)->where('formulario_id', $formularioId)->first();

        $formulario->delete();

        return response()->noContent();
    }
}
