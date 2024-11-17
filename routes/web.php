
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruta para obtener todas las películas
Route::get('/api/movies', function () {
    return response()->json(Movie::all());
});

// Ruta para obtener una película específica por ID
Route::get('/api/movies/{id}', function ($id) {
    return response()->json(Movie::findOrFail($id));
});

// Ruta para crear una nueva película
Route::post('/api/movies', function (Request $request) {
    $movie = new Movie();
    $movie->title = $request->input('title');
    $movie->synopsis = $request->input('synopsis');
    $movie->year = $request->input('year');
    $movie->cover = $request->input('cover');
    $movie->save();

    return response()->json($movie, 201);
});

// Ruta para actualizar una película existente
Route::put('/api/movies/{id}', function (Request $request, $id) {
    $movie = Movie::findOrFail($id);
    $movie->title = $request->input('title');
    $movie->synopsis = $request->input('synopsis');
    $movie->year = $request->input('year');
    $movie->cover = $request->input('cover');
    $movie->save();

    return response()->json($movie);
});

// Ruta para eliminar una película
Route::delete('/api/movies/{id}', function ($id) {
    $movie = Movie::findOrFail($id);
    $movie->delete();

    return response()->json(['message' => 'Película eliminada exitosamente']);
});

// Ruta temporal para ejecutar comandos de Artisan
Route::get('/run-artisan', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'Artisan commands executed successfully!';
});
