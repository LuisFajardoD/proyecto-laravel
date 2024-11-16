<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para el controlador MovieController
Route::get('/movies', [MovieController::class, 'index']); // Obtener todos los registros
Route::get('/movies/{id}', [MovieController::class, 'show']); // Obtener un registro por ID
Route::post('/movies', [MovieController::class, 'store']); // Insertar un nuevo registro
Route::put('/movies/{id}', [MovieController::class, 'update']); // Actualizar un registro
Route::delete('/movies/{id}', [MovieController::class, 'destroy']); // Eliminar un registro