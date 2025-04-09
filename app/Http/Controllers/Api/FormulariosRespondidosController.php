<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Formularios_Respondidos;
use App\Models\Formularios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;

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

    public function getFormulariosRespondidosUser(string $user_id){

        $formularios_respondidos = Formularios_Respondidos::where('user_id', $user_id)->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $formularios_respondidos
        ]);
    }

    public function getFormulariosRespondidosForm(string $formularioId){
        $formularios_respondidos = Formularios_Respondidos::where('formulario_id', $formularioId)->get();

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $formularios_respondidos
        ]);
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


    public function show(string $userId, string $formularioId)
    {
        $formulario_respondido = Formularios_Respondidos::where('user_id', $userId)->where('formulario_id', $formularioId)->first();

        return response() -> json([
            'status' => 201,
            'success' => true,
            'data' => $formulario_respondido
        ]);
    }



    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $userId, string $formularioId)
    {
        Formularios_Respondidos::where('user_id', $userId)->where('formulario_id', $formularioId)->delete();

        $validated = $request->validate([
            'score' => 'required'
        ]);

        $formulario_respondido = Formularios_Respondidos::create([
            'score' => $validated['score'],
            'user_id' => $userId,
            'formulario_id' => $formularioId,
        ]);

        return response()->json([
            'status' => 201,
            'success' => true,
            'data' => $formulario_respondido,
        ]);
    }

    public function destroy(string $userId, string $formularioId)
    {
        Formularios_Respondidos::where('user_id', $userId)
        ->where('formulario_id', $formularioId)
        ->delete();

        return response()->noContent();
    }
}
