<?php

use App\Controllers\Envasados;
use App\Controllers\Frutas;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Inicio;
use App\Controllers\Productos;
use App\Controllers\Verduras;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [Inicio::class, 'index']);

$routes->get('/productos', [Productos::class, 'productos']);

$routes->get('/frutas', [Frutas::class, 'frutas']);

$routes->get('/verduras', [Verduras::class, 'verduras']);

$routes->get('/envasados', [Envasados::class, 'envasados']);

