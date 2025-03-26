<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FormulariosController;
use App\Http\Controllers\api\NoteController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PostControllerAdvance;
use App\Http\Controllers\Api\PreguntasController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\api\RespuestasController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\api\UsuariosController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::apiResource('users', UserController::class);

    Route::post('users/updateimg', [UserController::class,'updateimg']); //Listar

    Route::apiResource('posts', PostControllerAdvance::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('roles', RoleController::class);

    Route::get('role-list', [RoleController::class, 'getList']);
    Route::get('role-permissions/{id}', [PermissionController::class, 'getRolePermissions']);
    Route::put('/role-permissions', [PermissionController::class, 'updateRolePermissions']);
    Route::apiResource('permissions', PermissionController::class);

    Route::get('category-list', [CategoryController::class, 'getList']);
    Route::get('/user', [ProfileController::class, 'user']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::post('/user/{id}', [UserController::class, 'updateUser']);
    Route::post('/user/updateimg/{id}', [UserController::class, 'updateimg']);


    Route::get('abilities', function(Request $request) {
        return $request->user()->roles()->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name')
            ->unique()
            ->values()
            ->toArray();
    });
});

Route::get('category-list', [CategoryController::class, 'getList']);

Route::get('get-posts', [PostControllerAdvance::class, 'getPosts']);
Route::get('get-category-posts/{id}', [PostControllerAdvance::class, 'getCategoryByPosts']);
Route::get('get-post/{id}', [PostControllerAdvance::class, 'getPost']);

Route::get('note',[NoteController::class, 'index'])->name('note.index');
Route::post('note', [NoteController::class, 'store'])->name('note.store');
Route::get('note/{id}', [NoteController::class, 'show'])->name('note.show');
Route::put('note/{id}', [NoteController::class, 'update'])->name('note.update');
Route::delete('note/{id}', [NoteController::class, 'destroy'])->name('note.destroy');

Route::get('usuarios',[UsuariosController::class, 'index']);
Route::post('usuarios', [UsuariosController::class, 'store']);
Route::delete('usuarios/{usuario}', [UsuariosController::class, 'destroy']);
Route::get('usuarios/{usuario}', [UsuariosController::class, 'show']);
Route::put('usuarios/{usuario}', [UsuariosController::class, 'update']);


Route::get('formulario', [FormulariosController::class, 'index']);
Route::get('formulario-user', [FormulariosController::class, 'userFormularios']);
Route::get('formulario/{id}', [FormulariosController::class, 'show']);
Route::post('formulario', [FormulariosController::class, 'store']);
Route::delete('formulario/{formulario}', [FormulariosController::class, 'destroy']);
Route::post ('formulario/{formulario}', [FormulariosController::class, 'update']);
Route::post('asignar-preguntas/{formularioId}', [FormulariosController::class, 'asignarPreguntas']);
Route::get('asignar-preguntas/{id}', [FormulariosController::class, 'getPreguntasFormulario']);
Route::get('preguntas-form/{id}', [FormulariosController::class, 'getPreguntasSinRespuesta']);
Route::post('verificar-respuesta', [FormulariosController::class, 'verificarRespuesta']);

Route::get('pregunta', [PreguntasController::class, 'index']);
Route::get('pregunta-user', [PreguntasController::class, 'userPreguntas']);
Route::post('pregunta', [PreguntasController::class, 'store']);
Route::get('pregunta/{id}', [PreguntasController::class, 'show']);
Route::delete('pregunta/{pregunta}', [PreguntasController::class, 'destroy']);
Route::put('pregunta/{id}', [PreguntasController::class, 'update']);

