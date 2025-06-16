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

// Registro, Login, Logout
$routes->get('/registro', 'Autenticacion::registro');
$routes->post('/registro', 'Autenticacion::registroPost');
$routes->get('/login', 'Autenticacion::login');
$routes->post('/login', 'Autenticacion::loginPost');
$routes->get('/logout', 'Autenticacion::logout');


// Carrito
$routes->get('/carrito', 'Carrito::index');
$routes->post('/carrito/agregar/(:num)', 'Carrito::agregar/$1');
$routes->post('/carrito/eliminar/(:num)', 'Carrito::eliminar/$1');


// Catalogo
$routes->get('/catalogo', 'Catalogo::index');
$routes->get('/catalogo/ver_catalogo/(:num)', 'Catalogo::ver_catalogo/$1');
$routes->get('/catalogo/ver_producto/(:num)', 'Catalogo::ver_producto/$1');

// Administrador
$routes->get('/admin', 'Admin::panel');
$routes->get('/admin/cargar-producto', 'Admin::cargarProducto');
$routes->post('/admin/guardar-producto', 'Admin::guardarProducto');