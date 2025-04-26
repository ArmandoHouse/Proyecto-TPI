<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Principal::index');

$routes->get('/quienes_somos', 'QuienesSomos::index');

$routes->get('/comercializacion', 'Comercializacion::index');

$routes->get('/contacto', 'Contacto::index');

$routes->get('/terminos', 'Terminos::index');
