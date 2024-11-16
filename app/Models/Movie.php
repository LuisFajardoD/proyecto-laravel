<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'movies';

    // Definimos los campos que se pueden asignar de forma masiva
    protected $fillable = ['title', 'synopsis', 'year', 'cover'];

    // Desactivar timestamps si no están siendo usados
    public $timestamps = true;
}
