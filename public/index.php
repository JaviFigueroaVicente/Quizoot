<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

try {
    // Intenta resolver el servicio 'view' manualmente desde el contenedor
    $viewFactory = $app->make('view');

    // Si la línea anterior no falla, el servicio SÍ existe.
    // Devolvemos una respuesta JSON para confirmarlo.
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ÉXITO', 'message' => 'El servicio [view] se cargó correctamente.']);
    exit;

} catch (\Throwable $e) {
    // Si la línea $app->make('view') falla, caerá aquí.
    // Devolvemos el error en formato JSON para poder verlo.
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode([
        'status' => 'ERROR',
        'message' => 'No se pudo resolver el servicio [view]. El problema es profundo.',
        'error_class' => get_class($e),
        'error_message' => $e->getMessage()
    ]);
    exit;
}

// $response = $kernel->handle(
//     $request = Request::capture()
// )->send();

// $kernel->terminate($request, $response);
