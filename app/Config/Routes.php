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

$routes->get('/catalogo', 'Catalogo::index');

$routes->get('/carrito', 'Carrito::index');

$routes->post('carrito/agregar/(:num)', 'Carrito::agregar/$1');

$routes->post('carrito/eliminar/(:num)', 'Carrito::eliminar/$1');


$routes->get('/admin/categorias', 'Categorias::index');

$routes->post('/admin/categorias/cargar_categoria', 'Categorias::cargarCategoria');

$routes->get('/admin/categorias/nueva', 'Categorias::nueva');

$routes->post('admin/categorias/eliminar/(:num)', 'Categorias::eliminar/$1');

$routes->get('/admin/categorias/reactivar/(:num)', 'Categorias::reactivar/$1');

$routes->get('/registro', 'Autenticacion::registrarse');

$routes->post('/registro', 'Autenticacion::registrarsePost');

$routes->get('/login', 'Autenticacion::login');

$routes->post('/login', 'Autenticacion::loginPost');

$routes->get('/logout', 'Autenticacion::logout');

$routes->get('/admin/cargar-producto', 'Admin::cargarProducto');

$routes->get('/admin', 'Admin::panel');

$routes->post('/admin/guardar-producto', 'Admin::guardarProducto');

$routes->get('/catalogo/(:num)', 'Catalogo::ver_producto/$1');