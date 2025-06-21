<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoItemModel extends Model
{
    protected $table      = 'pedidos_items';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio_unitario'
    ];

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
}
