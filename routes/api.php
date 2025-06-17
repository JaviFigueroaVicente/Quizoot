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
use App\Http\Controllers\api\FormulariosRespondidosController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\api\UsuariosController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::apiResource('users', UserController::class);

    Route::post('users/updateimg', [UserController::class,'updateimg']);

    Route::apiResource('roles', RoleController::class);

    Route::get('role-list', [RoleController::class, 'getList']);
    Route::get('role-permissions/{id}', [PermissionController::class, 'getRolePermissions']);
    Route::put('/role-permissions', [PermissionController::class, 'updateRolePermissions']);
    Route::apiResource('permissions', PermissionController::class);

    Route::get('category-list', [CategoryController::class, 'getList']);
    Route::get('/user', [ProfileController::class, 'user']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/user/{id}', [UserController::class, 'updateUser']);
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

    
Route::post('user', [UserController::class, 'register']);
Route::get('category-list', [CategoryController::class, 'getList']);

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
Route::get('ranking/{id}', [FormulariosController::class, 'getRankingFormulario']);

Route::apiResource('categories', CategoryController::class);
Route::post('asignar-categorias/{formularioId}', [FormulariosController::class, 'asignarCategorias']);
Route::get('/formularios/{id}/categorias', [FormulariosController::class, 'getCategoriasFormulario']);

Route::get('pregunta', [PreguntasController::class, 'index']);
Route::get('pregunta-user', [PreguntasController::class, 'userPreguntas']);
Route::post('pregunta', [PreguntasController::class, 'store']);
Route::get('pregunta/{id}', [PreguntasController::class, 'show']);
Route::delete('pregunta/{pregunta}', [PreguntasController::class, 'destroy']);
Route::put('pregunta/{id}', [PreguntasController::class, 'update']);

Route::get('formularios-respondidos', [FormulariosRespondidosController::class, 'index']);
Route::get('formularios-respondidos-user-logged', [FormulariosRespondidosController::class, 'getFormulariosRespondidosUserLogged']);
Route::get('formularios-respondidos/{user_id}', [FormulariosRespondidosController::class, 'getFormulariosRespondidosUser']);
Route::get('formularios-respondidos-formulario/{formularioId}', [FormulariosRespondidosController::class, 'getFormulariosRespondidosForm']);
Route::post('formulario-respondido', [FormulariosRespondidosController::class, 'store']);
Route::get('formulario-respondido/{userId}/{formularioId}', [FormulariosRespondidosController::class, 'show']);
Route::delete('formulario-respondido/{userId}/{formularioId}', [FormulariosRespondidosController::class, 'destroy']);
Route::post('formulario-respondido/{userId}/{formularioId}', [FormulariosRespondidosController::class, 'update']);
});

