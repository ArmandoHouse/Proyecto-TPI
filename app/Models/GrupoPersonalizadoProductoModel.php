<?php
namespace App\Models;

use CodeIgniter\Model;

class GrupoPersonalizadoProductoModel extends Model
{
    protected $table = 'grupo_personalizado_producto';
    protected $allowedFields = ['grupo_id', 'producto_id'];

    protected $returnType = 'array';
}