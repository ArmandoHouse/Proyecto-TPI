<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use App\Models\PedidoModel;
use App\Models\PedidoItemModel;
use App\Models\UsuarioModel;

class Pedidos extends BaseController
{
    public function index()
    {
        $pedidoModel = new PedidoModel();

        $pedidos = $pedidoModel
            ->select('pedidos.*, usuarios.nombre, usuarios.apellido, usuarios.email')
            ->join('usuarios', 'usuarios.id = pedidos.usuario_id')
            ->orderBy('pedidos.created_at', 'DESC')
            ->findAll();

        return view('back/pedidos/index', ['pedidos' => $pedidos]);
    }

    public function ver($id)
    {
        $pedidoModel = new PedidoModel();
        $pedidoItemModel = new PedidoItemModel();
        $usuarioModel = new UsuarioModel();

        $pedido = $pedidoModel->find($id);
        if (!$pedido) {
            return redirect()->to(base_url('admin/pedidos'))->with('error', 'Pedido no encontrado');
        }

        $usuario = $usuarioModel->find($pedido['usuario_id']);
        $items = $pedidoItemModel
            ->select('pedidos_items.*, productos.nombre, productos.imagen')
            ->join('productos', 'productos.id = pedidos_items.producto_id')
            ->where('pedido_id', $id)
            ->findAll();



        $estados = [
            'pendiente' => 'Pendiente',
            'confirmado' => 'Confirmado',
            'Pagado' => 'Pagado',
            'entregado' => 'Entregado',
            'cancelado' => 'Cancelado'
        ];

        return view('back/pedidos/ver', [
            'pedido' => $pedido,
            'usuario' => $usuario,
            'items' => $items,
            'estados' => $estados
        ]);
    }

    public function editar($id)
    {
        $request = $this->request;
     
        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->find($id);

        $pedido = [
            'estado'       => $request->getPost('estado')
        ];

        $pedidoModel->update($id, $pedido);

        return redirect()->to(base_url('admin/pedidos'));
    }
}
