<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;

use App\Models\CarritoItemModel;
use App\Models\ProductoModel;
use App\Models\PedidoModel;
use App\Models\PedidoItemModel;

class Carrito extends BaseController
{
    public function index()
    {
        $usuarioId = session('usuario_id');
        $db = \Config\Database::connect();

        $builder = $db->table('carrito_items');
        $builder->select('carrito_items.id as carrito_id, productos.id as producto_id, productos.nombre, productos.imagen, productos.precio, carrito_items.cantidad');
        $builder->join('productos', 'productos.id = carrito_items.producto_id');
        $builder->where('carrito_items.usuario_id', $usuarioId);

        $carrito = $builder->get()->getResultArray();

        return view('front/carrito', ['carrito' => $carrito]);
    }

    public function agregar($productoId)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($productoId);

        if (!$producto) {
            return redirect()->to(base_url('catalogo'))->with('error', 'Producto no encontrado');
        }

        $cantidad = (int) ($this->request->getPost('cantidad') ?? 1);
        $usuarioId = session('usuario_id');

        $carritoItemModel = new CarritoItemModel();

        $item = $carritoItemModel
            ->where('usuario_id', $usuarioId)
            ->where('producto_id', $productoId)
            ->first();

        if ($item) {
            // Si el producto ya está en el carrito, actualizamos la cantidad         
            $nuevaCantidad = $item['cantidad'] + $cantidad;
            $carritoItemModel->update($item['id'], ['cantidad' => $nuevaCantidad]);
        } else {
            // Si el producto no está en el carrito, lo agregamos          
            $carritoItemModel->insert([
                'usuario_id'  => $usuarioId,
                'producto_id' => $productoId,
                'cantidad'    => $cantidad
            ]);
        }

        // Redirige de vuelta a la vista del producto con un mensaje de éxito
        return redirect()->to(base_url('catalogo/ver_producto/' . $productoId))->with('success', 'Producto agregado al carrito');
    }

    public function eliminar($carritoId)
    {
        $carritoItemModel = new CarritoItemModel();
        $item = $carritoItemModel->find($carritoId);

        if (!$item || $item['usuario_id'] != session('usuario_id')) {
            return redirect()->to(base_url('carrito'))->with('error', 'No se pudo eliminar el producto del carrito');
        }

        $carritoItemModel->delete($carritoId);

        return redirect()->to(base_url('carrito'))->with('mensaje', 'Producto eliminado del carrito');
    }

    public function comprar()
    {
        $usuarioId = session('usuario_id');
        $carritoItemModel = new CarritoItemModel();
        $productoModel = new ProductoModel();
        $pedidoModel = new PedidoModel();
        $pedidoItemModel = new PedidoItemModel();

        // Obtener los items del carrito del usuario
        $carritoItems = $carritoItemModel->where('usuario_id', $usuarioId)->findAll();

        if (empty($carritoItems)) {
            return redirect()->to(base_url('carrito'))->with('error', 'No hay productos en el carrito.');
        }

        // Calcular el total del pedido
        $total = 0;
        foreach ($carritoItems as $item) {
            $producto = $productoModel->find($item['producto_id']);
            if ($producto) {
                $total += $producto['precio'] * $item['cantidad'];
            }
        }

        // Crear el pedido
        $pedidoId = $pedidoModel->insert([
            'usuario_id' => $usuarioId,
            'direccion_envio'      => '' ,
            'estado'     => 'pendiente',
            'total'      => $total
        ]);

        // Crear los items del pedido
        foreach ($carritoItems as $item) {
            $pedidoItemModel->insert([
                'pedido_id'   => $pedidoId,
                'producto_id' => $item['producto_id'],
                'cantidad'    => $item['cantidad'],
                'precio_unitario'      => $productoModel->find($item['producto_id'])['precio']
            ]);
        }

        // Soft delete de los items del carrito
        foreach ($carritoItems as $item) {
            $carritoItemModel->delete($item['id']);
        }

        return redirect()->to(base_url('carrito'))->with('mensaje', 'Compra finalizada con éxito');
    }
}
