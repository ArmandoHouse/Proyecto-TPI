<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;

use App\Models\CarritoItemModel;
use App\Models\ProductoModel;
use App\Models\PedidoModel;
use App\Models\UsuarioModel;

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

        // // Verifica si existe el producto
        // if (!$producto) {
        //     return redirect()->to(base_url('catalogo'))->with('error', 'Producto no encontrado');
        // }

        // $cantidad = (int) ($this->request->getPost('cantidad') ?? 1);

        // // Validar stock
        // if ($cantidad > $producto['stock']) {
        //     return redirect()->back()->withInput()->with('error', 'La cantidad seleccionada supera el stock disponible.');
        // }

        $cantidad = (int) ($this->request->getPost('cantidad') ?? 1);

        $validacion = $productoModel->validarDisponibilidad($productoId, $cantidad);
        if (isset($validacion['error'])) {
            switch ($validacion['error']) {
                case 'error_producto':
                    return redirect()->back()->with('error', 'Producto no encontrado');
                case 'error_stock':
                    return redirect()->back()->with('error', 'La cantidad seleccionada supera el stock disponible.');
            }
        }

        $usuarioId = session('usuario_id');
        $carritoItemModel = new CarritoItemModel();

        $item = $carritoItemModel
            ->where('usuario_id', $usuarioId)
            ->where('producto_id', $productoId)
            ->first();

        // Valida si la nueva cantidad más la ya existente en el carrito supera el stock del producto
        if ($item) {
            $nuevaCantidad = $item['cantidad'] + $cantidad;
            if ($nuevaCantidad > $producto['stock']) {
                return redirect()->back()->withInput()->with('error', 'La cantidad total en el carrito supera el stock disponible.');
            }
            $carritoItemModel->update($item['id'], ['cantidad' => $nuevaCantidad]);
        } else {
            $carritoItemModel->insert([
                'usuario_id'  => $usuarioId,
                'producto_id' => $productoId,
                'cantidad'    => $cantidad
            ]);
        }

        $isAjax = $this->request->isAJAX();

        if ($redirectTo = $this->request->getPost('redirect_to')) {
            if ($isAjax) {
                return $this->response->setJSON(['success' => 'Producto agregado al carrito']);
            }
            return redirect()->to($redirectTo)->with('success', 'Producto agregado al carrito');
        }
        if ($isAjax) {
            return $this->response->setJSON(['success' => 'Producto agregado al carrito']);
        }
        return redirect()->back()->with('success', 'Producto agregado al carrito');
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
        $pedidoModel = new PedidoModel();

        // Validar datos de facturación
        $usuarioModel = new UsuarioModel();
        $validacion = $usuarioModel->validarDatosFacturacion(session('usuario_id'));
        if (isset($validacion['error'])) {
            return redirect()->back()->with('error', $validacion['error']);
        }

        // Obtener los items del carrito del usuario
        $carritoItems = $carritoItemModel->where('usuario_id', $usuarioId)->findAll();

        if (empty($carritoItems)) {
            return redirect()->to(base_url('carrito'))->with('error', 'No hay productos en el carrito.');
        }

        // Crear el pedido
        $pedidoId = $pedidoModel->crearPedido($usuarioId, $carritoItems);

        // Soft delete de los items del carrito
        foreach ($carritoItems as $item) {
            $carritoItemModel->delete($item['id']);
        }

        return redirect()->to(base_url('pedidos/ver/' . $pedidoId))->with('success', 'Pedido realizado con éxito');
    }

    public function vaciar()
    {
        $usuarioId = session('usuario_id');
        $carritoItemModel = new CarritoItemModel();

        // Eliminar todos los items del carrito del usuario
        $carritoItemModel->where('usuario_id', $usuarioId)->delete();

        return redirect()->to(base_url('carrito'))->with('mensaje', 'Carrito vaciado con éxito');
    }
}
