<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('/', ['namespace' => 'App\Controllers\front'], function ($routes) {
    $routes->get('', 'Principal::index');
    $routes->get('quienes_somos', 'QuienesSomos::index');
    $routes->get('comercializacion', 'Comercializacion::index');
    $routes->get('terminos', 'Terminos::index');
    $routes->get('carrito', 'Carrito::index');
   
    $routes->get('contacto', 'Contacto::index');   
    $routes->post('contacto/enviar', 'Contacto::enviar'); 
   
   
    // Registro, Login
    $routes->get('registro', 'Autenticacion::registro');
    $routes->post('registro', 'Autenticacion::registroPost');
    $routes->get('login', 'Autenticacion::login');
    $routes->post('login', 'Autenticacion::loginPost');
    
    // Catalogo
    $routes->get('catalogo/ver_catalogo/(:num)', 'Catalogo::ver_catalogo/$1');
    $routes->get('catalogo/ver_producto/(:num)', 'Catalogo::ver_producto/$1');


    $routes->group('/', ['filter' => 'sesion_valida'], function ($routes) {
        $routes->get('perfil', 'Perfil::index');
        $routes->get('logout', 'Autenticacion::logout');

        $routes->post('carrito/agregar/(:num)', 'Carrito::agregar/$1');
        $routes->post('carrito/eliminar/(:num)', 'Carrito::eliminar/$1');
        $routes->post('carrito/comprar', 'Carrito::comprar');

        $routes->get('pedidos', 'Pedido::index');
        $routes->get('pedidos/ver/(:num)', 'Pedido::ver/$1');
        $routes->post('pedidos/generar/(:num)', 'Pedido::generar/$1');

        $routes->get('consultas', 'Consulta::index');
        $routes->get('consultas/crear', 'Consulta::crear');
        $routes->post('consultas/crear', 'Consulta::crearPost');
        $routes->get('consultas/ver/(:num)', 'Consulta::ver/$1');
        $routes->post('consultas/responder/(:num)', 'Consulta::responderPost/$1');
    });
});


$routes->group('admin', ['namespace' => 'App\Controllers\back', 'filter' => 'sesion_admin'], function ($routes) {
    $routes->get('', 'Admin::panel');

    // Productos
    $routes->get('productos', 'Productos::productos');
    $routes->get('productos/agregar', 'Productos::agregarProducto');
    $routes->post('productos/agregar', 'Productos::agregarProductoPost');
    $routes->get('productos/editar/(:num)', 'Productos::editarProducto/$1');
    $routes->post('productos/editar/(:num)', 'Productos::editarProductoPost/$1');
    $routes->post('productos/eliminar/(:num)', 'Productos::eliminarProducto/$1');

    // Usuarios
    $routes->get('usuarios', 'Usuarios::usuarios');
    $routes->get('usuarios/activar/(:num)', 'Usuarios::activarUsuario/$1');
    $routes->get('usuarios/suspender/(:num)', 'Usuarios::suspenderUsuario/$1');
    $routes->get('usuarios/eliminar/(:num)', 'Usuarios::eliminarUsuario/$1');

    // Categorias
    $routes->get('categorias', 'Categorias::index');
    $routes->get('categorias/agregar', 'Categorias::agregarCategoria');
    $routes->post('categorias/agregar', 'Categorias::agregarCategoriaPost');
    $routes->post('categorias/ocultar/(:num)', 'Categorias::ocultar/$1');
    $routes->get('categorias/activar/(:num)', 'Categorias::activar/$1');
    $routes->get('categorias/eliminar/(:num)', 'Categorias::eliminar/$1');
    $routes->get('categorias/inactivas', 'Categorias::inactivas');
    $routes->get('categorias/editar/(:num)', 'Categorias::editar/$1');
    $routes->post('categorias/editar/(:num)', 'Categorias::editarPost/$1');


    $routes->get('consultas', 'Consultas::index');
    $routes->get('consultas/ver/(:num)', 'Consultas::ver/$1');
    $routes->post('consultas/responder/(:num)', 'Consultas::responder/$1');
    $routes->post('consultas/cerrar/(:num)', 'Consultas::cerrar/$1');


    $routes->get('contactos', 'Contactos::index');
    $routes->get('contactos/ver/(:num)', 'Contactos::ver/$1');
    $routes->get('contactos/cambiar_estado/(:num)', 'Contactos::cambiarEstado/$1');

    $routes->get('pedidos', 'Pedidos::index');
    $routes->get('pedidos/ver/(:num)', 'Pedidos::ver/$1');
    $routes->post('pedidos/editar/(:num)', 'Pedidos::editar/$1');
});
