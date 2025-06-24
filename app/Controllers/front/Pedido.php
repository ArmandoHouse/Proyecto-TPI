<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;
use App\Models\PedidoModel;
use App\Models\PedidoItemModel;
use App\Models\ProductoModel;
use App\Models\UsuarioModel;

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
            ->select('pedidos.*, usuarios.nombre as usuario_nombre, usuarios.apellido as usuario_apellido, usuarios.email as usuario_email,  usuarios.direccion as usuario_direccion')
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
        $pedidoItemModel = new PedidoItemModel();
        $productoModel = new ProductoModel();
        $usuarioModel = new UsuarioModel();

        $usuarioId = session('usuario_id'); // Obtener el ID del usuario desde la sesión

        // Verificar si el usuario existe
        $usuario = $usuarioModel->find($usuarioId);
        if (!$usuario) {
            return redirect()->to(base_url('login'))->with('error', 'Usuario no encontrado.');
        }

        // Comprobar si la dirección del usuario está completa
        if (empty($usuario['direccion'])) {
            return redirect()->to(base_url('perfil/chequear_informacion'))->with('error', 'Debe completar su informacion personal antes de confirmar el pedido.');
        }

        // Verificar si el producto existe
        $producto = $productoModel->find($productoId);
        if (!$producto) {
            return redirect()->to(base_url('catalogo'))->with('error', 'Producto no encontrado.');
        }

        // Calcular el total del pedido
        $cantidad = 1; // Por defecto, se genera el pedido con una unidad
        $total = $producto['precio'] * $cantidad;

        // Crear el pedido
        $pedidoId = $pedidoModel->insert([
            'usuario_id'       => $usuarioId,
            'direccion_envio'  => $usuario['direccion'],
            'estado'           => 'pendiente',
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
        return redirect()->to(base_url('pedidos/ver/' . $pedidoId))->with('success', 'Pedido generado exitosamente.');
    }
}
