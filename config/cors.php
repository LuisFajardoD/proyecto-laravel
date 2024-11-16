<?php

return [

    'paths' => ['api/*'], // Permite las solicitudes CORS en las rutas de la API

    'allowed_methods' => ['*'], // Permite todos los métodos (GET, POST, PUT, DELETE, etc.)

    'allowed_origins' => ['http://localhost:4200'], // Permite solicitudes desde Angular en localhost

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Permite todos los encabezados

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
