<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Inicio;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [Inicio::class, 'index']);
