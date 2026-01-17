<?php

use App\Controllers\Envasados;
use App\Controllers\Frutas;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Inicio;
use App\Controllers\Productos;
use App\Controllers\Users;
use App\Controllers\UsersBackend;
use App\Controllers\Verduras;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [Inicio::class, 'index']);

$routes->get('/productos', [Productos::class, 'productos']);
$routes->get('/productos/(:segment)', [Productos::class, 'productos']);
$routes->get('/frutas', [Frutas::class, 'frutas']);
$routes->get('/verduras', [Verduras::class, 'verduras']);
$routes->get('/envasados', [Envasados::class, 'envasados']);

//Mostrar formulario
$routes->get('login',[Users::class, 'loginForm']);

//Checkear formulario y cerrar sesión
$routes->post('login', [Users::class, 'checkUser']);
$routes->get('session', [Users::class, 'closeSession']);

//Mostrar el registro
$routes->get('registro',[Users::class, 'registroForm']);
//Añadir el nuevo usuario
$routes->post('registro', [Users::class, 'registro']);


//Rutas del backend
$routes->group('backend', function($routes){
    //Inicio backend
    $routes->get('admin', [UsersBackend::class, 'index']);
    //Administrar maravillas
    $routes->get('wonder', [UsersBackend::class, 'wonder']);
    $routes->post('wonder/create', [UsersBackend::class, 'create']);
    
});


$routes->get('/(:segment)', [Inicio::class, 'index']);

