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

        // Calcular totales y armar productos
        $products = [];
        $subtotal = 0;
        foreach ($items as $item) {
            $productSubtotal = $item['producto_precio'] * $item['cantidad'];
            $products[] = [
                'id' => $item['producto_id'],
                'name' => $item['producto_nombre'],
                'quantity' => $item['cantidad'],
                'unitPrice' => $item['producto_precio'],
                'subtotal' => $productSubtotal,
            ];
            $subtotal += $productSubtotal;
        }

        // Calcular impuestos y total
        $tax = $subtotal * 0.21;
        $total = $subtotal + $tax;

        // Armar el array para JS
        $pedidoData = [
            'invoice' => [
                'number' => 'INV-' . date('Y', strtotime($pedido['created_at'])) . '-' . str_pad($pedido['id'], 6, '0', STR_PAD_LEFT),
                'date' => $pedido['created_at'],
            ],
            'client' => [
                'name' => $pedido['usuario_nombre'] . ' ' . $pedido['usuario_apellido'],
                'email' => $pedido['usuario_email'],
                'dni' => $pedido['usuario_dni'] ?? '-',
                'phone' => $pedido['usuario_telefono'] ?? '-',
                'address' => $pedido['usuario_direccion'] ?? '-',
            ],
            'products' => $products,
            'totals' => [
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
            ],
        ];

        return view('front/pedidos/ver', [
            'pedidoData' => $pedidoData,
            'pedido' => $pedido,
            'items' => $items,
        ]);
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
        
        // Validar datos de facturación
        $usuarioModel = new UsuarioModel();   
        $validacion = $usuarioModel->validarDatosFacturacion(session('usuario_id'));
        if (isset($validacion['error'])) {
            return redirect()->back()->with('error', $validacion['error']);
        }

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
