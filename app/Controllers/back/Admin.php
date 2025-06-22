<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;

use App\Models\UsuarioModel;
use App\Models\ProductoModel;
use App\Models\PedidoModel;
use App\Models\CategoriaModel;
use App\Models\ConsultaModel;
use App\Models\ContactoModel;

class Admin extends BaseController
{
    public function panel()
    {
        $usuarioModel = new UsuarioModel();
        $productoModel = new ProductoModel();
        $pedidoModel = new PedidoModel();
        $categoriaModel = new CategoriaModel();
        $consultaModel = new ConsultaModel();
        $contactoModel = new ContactoModel();

        $data = [
            'usuarios'    => $usuarioModel->countAll(),
            'productos'   => $productoModel->countAll(),
            'pedidos'     => $pedidoModel->countAll(),
            'categorias'  => $categoriaModel->countAll(),
            'consultas'   => $consultaModel->countAll(),
            'contactos'   => $consultaModel->countAll()
        ];

        return view('back/panel', $data);
    }
}
