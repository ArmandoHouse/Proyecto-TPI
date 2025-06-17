<?php

namespace App\Controllers;

use App\Models\CarritoItemsModel;
use App\Models\ProductosModel;

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

        return view('frontend/carrito', ['carrito' => $carrito]);
    }

    public function agregar($productoId)
    {
        $productoModel = new ProductosModel();
        $producto = $productoModel->find($productoId);

        if (!$producto) {
            return redirect()->to(base_url('public/catalogo'))->with('error', 'Producto no encontrado');
        }

        $cantidad = (int) ($this->request->getPost('cantidad') ?? 1);
        $usuarioId = session('usuario_id');

        $carritoItemModel = new CarritoItemsModel();

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
        return redirect()->to(base_url('public/catalogo/ver_producto/' . $productoId))->with('success', 'Producto agregado al carrito');
    }

    public function eliminar($carritoId)
    {
        $carritoItemModel = new CarritoItemsModel();
        $item = $carritoItemModel->find($carritoId);

        if (!$item || $item['usuario_id'] != session('usuario_id')) {
            return redirect()->to(base_url('public/carrito'))->with('error', 'No se pudo eliminar el producto del carrito');
        }

        $carritoItemModel->delete($carritoId);

        return redirect()->to(base_url('public/carrito'))->with('mensaje', 'Producto eliminado del carrito');
    }
}
