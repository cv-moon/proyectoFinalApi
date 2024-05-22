<?php

use App\Http\Controllers\Api\ConductorController;
use App\Http\Controllers\Api\EstudianteController;
use App\Http\Controllers\Api\RutaController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/conductores', [ConductorController::class, 'index']);
Route::get('/rutas', [RutaController::class, 'index']);
Route::get('/rutas/{id}', [RutaController::class, 'showStudents']);
Route::post('/estudiantes', [EstudianteController::class, 'store']);
Route::get('/estudiantes/{id}', [EstudianteController::class, 'show']);
Route::put('/estudiantes/pass/{id}', [EstudianteController::class, 'updatePassword']);
Route::post('/login', [LoginController::class, 'login']);
