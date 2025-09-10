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

        // Obtener filtros desde GET
        $cliente = $this->request->getGet('cliente');
        $estado = $this->request->getGet('estado');

        $builder = $pedidoModel
            ->select('pedidos.*, usuarios.nombre, usuarios.apellido, usuarios.email')
            ->join('usuarios', 'usuarios.id = pedidos.usuario_id');

        // Filtro por nombre o apellido de cliente
        if ($cliente) {
            $builder->groupStart()
                ->like('usuarios.nombre', $cliente)
                ->orLike('usuarios.apellido', $cliente)
                ->groupEnd();
        }

        // Filtro por estado
        if ($estado) {
            $builder->where('pedidos.estado', $estado);
        }

        $id = $this->request->getGet('id');

        if ($id) {
            $builder->where('pedidos.id', $id);
        }

        $pedidos = $builder->orderBy('pedidos.created_at', 'DESC')->findAll();

        // Pasar los filtros a la vista para mantener los valores en los inputs
        $filtros = [
            'id' => $id,
            'cliente' => $cliente,
            'estado' => $estado,
        ];

        return view('back/pedidos/index', [
            'pedidos' => $pedidos,
            'filtros' => $filtros,
        ]);
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
            'cancelado' => 'Cancelado',
            'enviado' => 'Enviado',
            'entregado' => 'Entregado'
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
