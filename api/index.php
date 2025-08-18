<?php

// Redirige las peticiones de archivos estáticos al public de Laravel si existen
if (file_exists(__DIR__.'/../public'.$_SERVER['REQUEST_URI'])) {
    return false;
}

// Carga el autoloader de Composer
require_once __DIR__.'/../vendor/autoload.php';

// Inicia la aplicación de Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Maneja la petición entrante a través del Kernel HTTP
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

// Termina la aplicación
$kernel->terminate($request, $response);