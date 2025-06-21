<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;
use App\Models\PedidoModel;
use App\Models\PedidoItemModel;

class Pedido extends BaseController
{
    public function index(): string
    {
        $pedidoModel = new PedidoModel();
        $pedidos = $pedidoModel->where('usuario_id', session('usuario_id'))->findAll();

        return view('front/pedidos/index', ['pedidos' => $pedidos]);
    }

    public function ver($id_pedido)
    {
        $pedidoModel = new PedidoModel();
        $pedidoItemModel = new PedidoItemModel();

        $pedido = $pedidoModel->find($id_pedido);

        $pedido = $pedidoModel
            ->where('pedidos.id', $id_pedido)
            ->select('pedidos.*, usuarios.nombre, usuarios.apellido, usuarios.email')
            ->join('usuarios', 'usuarios.id = pedidos.usuario_id')
            ->first();

        if (!$pedido) {
            return redirect()->to(base_url('pedidos'))->with('error', 'Pedido no encontrado.');
        }

        $items = $pedidoItemModel->where('pedido_id', $id_pedido)->findAll();

        return view('front/pedidos/ver', ['pedido' => $pedido, 'items' => $items]);
    }
}
