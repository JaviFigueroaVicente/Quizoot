<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return response()->json([
            'status' => 405, 
            'success' => true, 
            'data' => $usuarios
        ]);
    }

    public function update(Request $request, Usuarios $usuario)
    {
        try {
            // Validar los datos recibidos
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string',
                'surname' => 'required|string',
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
            $usuario->update($data);

            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => $usuario
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

    public function store(Request $request)
    {
        $usuario = new Usuarios();
        $usuario->id = $request->id;
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->surname = $request->surname;

        $usuario->save();
        
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $usuario
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => ['required','max:50'],
            'email' => ['required'],
            'surname' => 'required'
        ]);

        $data = $validator->validated();
        return $validator->errors();

        $usuario = Usuarios::create($data);

        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $usuario
        ]);
    }

    public function show(Usuarios $usuario)

    {
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => $usuario
        ]);
    }

    public function destroy(Usuarios $usuario){
        $usuario->delete();
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => ''
        ]);
    }
}
