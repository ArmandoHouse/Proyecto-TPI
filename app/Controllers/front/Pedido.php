<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;
use App\Models\PedidoModel;
use App\Models\PedidoItemModel;
use App\Models\ProductoModel;

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

    public function generar($productoId)
    {
        $pedidoModel = new PedidoModel();
        $pedidoItemModel = new PedidoItemModel();
        $productoModel = new ProductoModel();

        $usuarioId = session('usuario_id');
        $cantidad = $this->request->getPost('cantidad'); // Obtener la cantidad desde el formulario

        // Verificar si el producto existe
        $producto = $productoModel->find($productoId);
        if (!$producto) {
            return redirect()->to(base_url('catalogo'))->with('error', 'Producto no encontrado');
        }

        // Calcular el total del pedido
        $total = $producto['precio'] * $cantidad;

        // Crear el pedido
        $pedidoId = $pedidoModel->insert([
            'usuario_id'       => $usuarioId,
            'direccion_envio'  => '', // Puedes agregar lógica para capturar la dirección de envío
            'estado'           => 'pendiente', // Estado inicial del pedido
            'total'            => $total,
            'fecha'            => date('Y-m-d H:i:s')
        ]);

        // Crear el item del pedido
        $pedidoItemModel->insert([
            'pedido_id'   => $pedidoId,
            'producto_id' => $productoId,
            'cantidad'    => $cantidad,
            'precio_unitario' => $producto['precio']
        ]);

        // Redirigir al detalle del pedido
        return redirect()->to(base_url('pedidos/ver/' . $pedidoId))->with('success', 'Pedido generado exitosamente');
    }
}
