<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoItemModel extends Model
{

    protected $table      = 'carrito_items';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'usuario_id',
        'producto_id',
        'cantidad'
    ];

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
}
