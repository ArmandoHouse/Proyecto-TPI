<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'usuario_id',
        'direccion_envio',
        'estado',
        'total'
    ];

    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function crearPedido($usuarioId, $productos, $direccionEnvio = '')
    {
        $pedidoModel = new PedidoModel();
        $pedidoItemModel = new PedidoItemModel();
        $productoModel = new ProductoModel();

        // Calcular el total
        $total = 0;
        foreach ($productos as $item) {
            $producto = $productoModel->find($item['producto_id']);
            if ($producto) {
                $total += $producto['precio'] * $item['cantidad'];
            }
        }

        // Crear el pedido
        $pedidoId = $pedidoModel->insert([
            'usuario_id'      => $usuarioId,
            'direccion_envio' => $direccionEnvio,
            'estado'          => 'pendiente',
            'total'           => $total,
            'fecha'           => date('Y-m-d H:i:s')
        ]);

        // Crear los items y descontar stock
        foreach ($productos as $item) {
            $producto = $productoModel->find($item['producto_id']);
            if ($producto) {
                $pedidoItemModel->insert([
                    'pedido_id'      => $pedidoId,
                    'producto_id'    => $item['producto_id'],
                    'cantidad'       => $item['cantidad'],
                    'precio_unitario' => $producto['precio']
                ]);
                // Descontar stock
                $nuevoStock = $producto['stock'] - $item['cantidad'];
                $estado = $producto['estado'];
                if ($nuevoStock <= 0) {
                    $nuevoStock = 0;
                    $estado = 'oculto';
                }
                $productoModel->update($producto['id'], [
                    'stock' => $nuevoStock,
                    'estado' => $estado
                ]);
            }
        }

        return $pedidoId;
    }
}
