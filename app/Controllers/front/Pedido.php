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
            ->select('pedidos.*, usuarios.nombre as usuario_nombre, usuarios.apellido as usuario_apellido, usuarios.email as usuario_email')
            ->join('usuarios', 'usuarios.id = pedidos.usuario_id')
            ->first();

        if (!$pedido) {
            return redirect()->to(base_url('pedidos'))->with('error', 'Pedido no encontrado.');
        }

        $items = $pedidoItemModel
            ->where('pedidos_items.pedido_id', $id_pedido)
            ->select('pedidos_items.*, productos.nombre as producto_nombre, productos.descripcion as producto_descripcion, productos.precio as producto_precio')
            ->join('productos', 'productos.id = pedidos_items.producto_id')
            ->findAll();

        return view('front/pedidos/ver', ['pedido' => $pedido, 'items' => $items]);
    }


    public function generar($productoId)
    {
        $pedidoModel = new PedidoModel();
        $productoModel = new ProductoModel();

        $usuarioId = session('usuario_id');
        $cantidad = $this->request->getPost('cantidad');

        // // Verificar si el producto existe
        // $producto = $productoModel->find($productoId);
        // if (!$producto) {
        //     return redirect()->to(base_url('catalogo'))->with('error', 'Producto no encontrado');
        // }

        // // Validar stock
        // if ($cantidad > $producto['stock']) {
        //     return redirect()->back()->withInput()->with('error', 'La cantidad seleccionada supera el stock disponible.');
        // }

        $validacion = $productoModel->validarDisponibilidad($productoId, $cantidad);
        if (isset($validacion['error'])) {
            switch ($validacion['error']) {
                case 'error_producto':
                    return redirect()->back()->with('error', 'Producto no encontrado');
                case 'error_stock':
                    return redirect()->back()->with('error', 'La cantidad seleccionada supera el stock disponible.');
            }
        }

        // Crear el pedido
        $pedidoId = $pedidoModel->crearPedido($usuarioId, [['producto_id' => $productoId, 'cantidad' => $cantidad]]);

        // Redirigir al detalle del pedido
        return redirect()->to(base_url('pedidos/ver/' . $pedidoId))->with('success', 'Pedido generado exitosamente');
    }
}
