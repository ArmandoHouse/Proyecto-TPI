<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/productos', 'Productos::index');

$routes->get('/contactos', 'Contactos::index');

$routes->get('/terminos', 'Terminos::index');

$routes->get('/quienes-somos', 'QuienesSomos::index');