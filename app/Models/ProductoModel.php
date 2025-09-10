<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'nombre',
        'descripcion',
        'imagen',
        'categoria_id',
        'stock',
        'precio',
        'estado'
    ];

    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    
    public function validarDisponibilidad($productoId, $cantidad = 1)
    {
        $producto = $this->find($productoId);

        if (!$producto) {
            return ['error' => 'error_producto'];
        }   
        if ($cantidad > $producto['stock']) {
            return ['error' => 'error_stock'];
        }
        return ['producto' => $producto];
    }

}
