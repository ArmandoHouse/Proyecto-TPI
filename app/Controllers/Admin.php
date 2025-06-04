<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function cargarProducto()
    {
        // Verificamos si es admin
        if (session()->get('rol') !== 'admin') {
            return redirect()->to('public/')->with('mensaje', 'Acceso denegado');
        }

        return view('admin/cargar_producto');
    }
}
