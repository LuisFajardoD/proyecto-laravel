
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí defines las rutas relacionadas con la parte web (vistas, páginas).
| Estas rutas no se utilizan para la API.
|
*/

// Ruta de bienvenida (carga la vista "welcome.blade.php")
Route::get('/', function () {
    return view('welcome');
});
