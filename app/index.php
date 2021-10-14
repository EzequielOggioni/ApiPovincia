<?php

error_reporting(-1);
ini_set('display_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/accesoADatos/Archivos.php';
require __DIR__ . '/accesoADatos/AccesoDatos.php';
require __DIR__ . '/controllers/UsuarioController.php';
require __DIR__ . '/controllers/ProvinciaController.php';
require __DIR__ . '/Interfaces/IInterfaz.php';
require __DIR__ . '/entidades/Usuario.php';
require __DIR__ . '/entidades/Localidad.php';
require __DIR__ . '/entidades/Provincia.php';
require __DIR__ . '/entidades/Departamento.php';


// Instantiate App
$app = AppFactory::create();
// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Enable CORS
$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    // $routeContext = RouteContext::fromRequest($request);
    // $routingResults = $routeContext->getRoutingResults();
    // $methods = $routingResults->getAllowedMethods();
    
    $response = $handler->handle($request);

    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'get,post,put,delete,option');
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);

    // Optional: Allow Ajax CORS requests with Authorization header
    // $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');

    return $response;
});

$app->get('[/]', \ProvinciaController::class . ':RetornarProvincias' );

$app->group('/Provincia', function (RouteCollectorProxy $group) {
    $group->get('[/]', \ProvinciaController::class . ':RetornarProvincias' );
    $group->post('[/]', \ProvinciaController::class . ':CrearProvincia' );
    $group->get('/Imagen/{provinciaId}[/]', \ProvinciaController::class . ':RetornarImagen' );
    $group->get('/Departamento/{provinciaId}[/]', \ProvinciaController::class . ':RetornarDepartamentos' );
    $group->post('/HolaMundo/{param}[/]', \UsuarioController::class . ':LeerJSONPost' );
});

$app->group('/Ciudad', function (RouteCollectorProxy $group) {
    $group->get('[/]', \ProvinciaController::class . ':RetornarProvincias' );
    $group->post('[/]', \ProvinciaController::class . ':CrearProvincia' );
    $group->get('/Imagen/{provinciaId}[/]', \ProvinciaController::class . ':RetornarImagen' );
    $group->get('/Departamento/{provinciaId}[/]', \ProvinciaController::class . ':RetornarDepartamentos' );
    $group->post('/HolaMundo/{param}[/]', \UsuarioController::class . ':LeerJSONPost' );
});



$app->group('/Producto', function (RouteCollectorProxy $group) {
    $group->get('[/]', \ProductoController::class . ':RetornarProductos' );
    $group->post('[/]', \ProductoController::class . ':CrearProducto' );
    $group->get('/Imagen/{ProductoId}[/]', \ProductoController::class . ':RetornarImagen' );
    $group->get('/Departamento/{ProductoId}[/]', \ProductoController::class . ':RetornarDepartamentos' );
    $group->post('/HolaMundo/{param}[/]', \UsuarioController::class . ':LeerJSONPost' );
});

$app->run();