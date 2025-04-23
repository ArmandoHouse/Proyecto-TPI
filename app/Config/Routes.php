<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/productos', 'Productos::index');

$routes->get('/contacto', 'Contactos::index');

$routes->get('/terminos', 'Terminos::index');

$routes->get('/nosotros', 'Nosotros::index');

$routes->get('/envios-y-pagos', 'EnviosYPagos::index');