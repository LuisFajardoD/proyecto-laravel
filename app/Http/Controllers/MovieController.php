<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MovieController extends Controller
{
    // Función GET para obtener todos los registros
    public function index()
    {
        return response()->json(Movie::all(), 200);
    }

    // Función GET para obtener un registro por ID
    public function show($id)
    {
        try {
            $movie = Movie::findOrFail($id);
            return response()->json($movie, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    // Función POST para crear un nuevo registro
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'year' => 'required|integer',
            'cover' => 'required|string',
        ]);

        $movie = Movie::create($validatedData);

        return response()->json($movie, 201);
    }

    // Función PUT para actualizar un registro
    public function update(Request $request, $id)
    {
        try {
            $movie = Movie::findOrFail($id);

            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'synopsis' => 'required|string',
                'year' => 'required|integer',
                'cover' => 'required|string',
            ]);

            $movie->update($validatedData);

            return response()->json($movie, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    // Función DELETE para eliminar un registro
    public function destroy($id)
    {
        try {
            $movie = Movie::findOrFail($id);
            $movie->delete();

            return response()->json(['message' => 'Movie deleted successfully'], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }
}
