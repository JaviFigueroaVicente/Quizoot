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
        //
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

    public function formularioRespondido(Request $request, $formularioId)
    {
        $formulario = Formularios_Respondidos::select('user_id', 'MAX(score) as max_score')->where('formulario_id', $formularioId)->groupBy('user_id')->orderBy('max_score', 'desc')->get();

        return response()->json([
            'status' => 201,
            'success' => true,
            'data' => $formulario,
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function destroy(Formularios_Respondidos $formularios_Respondidos)
    {
        //
    }
}
