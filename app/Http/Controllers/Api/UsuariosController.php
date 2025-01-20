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
            $usuarios
        ]);
    }

    public function store(Request $request)
    {
        $usuario = new Usuarios();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

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
            'name' => ['required','max:255'],
            'email' => ['required','unique:Usuarios'],
            'password' => 'required|min:8'
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

    public function destroy(Usuarios $usuario){
        $usuario->delete();
        return response()->json([
            'status' => 405,
            'success' => true,
            'data' => ''
        ]);
    }
}
