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
$routes->get('/carrito', 'Carrito::index');

// Registro, Login
$routes->get('/registro', 'Autenticacion::registro');
$routes->post('/registro', 'Autenticacion::registroPost');
$routes->get('/login', 'Autenticacion::login');
$routes->post('/login', 'Autenticacion::loginPost');

// Catalogo
$routes->get('/catalogo/ver_catalogo/(:num)', 'Catalogo::ver_catalogo/$1');
$routes->get('/catalogo/ver_producto/(:num)', 'Catalogo::ver_producto/$1');


// Filtro usuarios validos
$routes->group('', ['filter' => 'sesion_valida'], function ($routes) {

    $routes->get('/logout', 'Autenticacion::logout');

    $routes->post('/carrito/agregar/(:num)', 'Carrito::agregar/$1');
    $routes->post('/carrito/eliminar/(:num)', 'Carrito::eliminar/$1');


    $routes->group('admin', ['filter' => 'sesion_admin'], function ($routes) {
        $routes->get('', 'Admin::panel');

        $routes->get('productos', 'Admin::productos');

        $routes->get('productos/agregar', 'Admin::agregarProducto');
        $routes->post('productos/agregar', 'Admin::agregarProductoPost');

        $routes->get('productos/editar/(:num)', 'Admin::editarProducto/$1');
        $routes->post('productos/editar/(:num)', 'Admin::editarProductoPost/$1');

        $routes->post('productos/eliminar/(:num)', 'Admin::eliminarProducto/$1');

        $routes->get('usuarios', 'Admin::usuarios');
        $routes->get('usuarios/activar/(:num)', 'Admin::activarUsuario/$1');
        $routes->get('usuarios/suspender/(:num)', 'Admin::suspenderUsuario/$1');
        $routes->get('usuarios/eliminar/(:num)', 'Admin::eliminarUsuario/$1');
    });
});
