<?php

namespace App\Controllers;

class Carrito extends BaseController
{
    public function index(): string
    {
        if (!session()->has('usuario_id')) {
            return redirect()->to(base_url('public/login'))->with('mensaje', 'Debés iniciar sesión para ver tu carrito');
        }
    
        $usuarioId = session('usuario_id');
        $db = \Config\Database::connect();
    
        $builder = $db->table('carrito_items');
        $builder->select('carrito_items.id as carrito_id, productos.id as producto_id, productos.nombre, productos.imagen, productos.precio, carrito_items.cantidad');
        $builder->join('productos', 'productos.id = carrito_items.producto_id');
        $builder->where('carrito_items.usuario_id', $usuarioId);
    
        $carrito = $builder->get()->getResultArray();
    
        return view('carrito/carrito', ['carrito' => $carrito]);
    
    }

    public function agregar($productoId)
    {
        if (!session()->has('usuario_id')) {
            return redirect()->to(base_url('public/login'))->with('mensaje', 'Debés iniciar sesión para agregar productos al carrito');
        }
    
        $productoModel = new \App\Models\ProductosModel();
        $producto = $productoModel->find($productoId);
    
        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
    
        $cantidad = (int) $this->request->getPost('cantidad') ?? 1;
        $usuarioId = session('usuario_id');
    
        $carritoModel = new \App\Models\CarritoModel();
    
        // Buscar si ya hay ese producto en el carrito del usuario
        $item = $carritoModel
            ->where('usuario_id', $usuarioId)
            ->where('producto_id', $productoId)
            ->first();
    
        if ($item) {
            // Ya está en el carrito: actualizar cantidad
            $nuevaCantidad = $item['cantidad'] + $cantidad;
            $carritoModel->update($item['id'], ['cantidad' => $nuevaCantidad]);
        } else {
            // No existe: insertar nuevo registro
            $carritoModel->insert([
                'usuario_id'  => $usuarioId,
                'producto_id' => $productoId,
                'cantidad'    => $cantidad
            ]);
        }
    
        return redirect()->to(base_url('public/catalogo'))->with('mensaje', 'Producto agregado al carrito');
    }

    public function eliminar($carritoId)
    {
        if (!session()->has('usuario_id')) {
            return redirect()->to(base_url('public/login'))->with('mensaje', 'Debés iniciar sesión');
        }

        $carritoModel = new \App\Models\CarritoModel();
        $item = $carritoModel->find($carritoId);

        if (!$item || $item['usuario_id'] != session('usuario_id')) {
            return redirect()->to(base_url('public/carrito'))->with('error', 'No se pudo eliminar el producto del carrito');
        }

        $carritoModel->delete($carritoId);

        return redirect()->to(base_url('public/carrito'))->with('mensaje', 'Producto eliminado del carrito');
    }

}
