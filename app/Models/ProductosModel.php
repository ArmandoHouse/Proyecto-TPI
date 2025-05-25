<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model {

    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array'; //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'descripcion', 'imagen', 'categoria_id', 'stock', 'precio', 'baja'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = false;

    // Dates
    protected $useTimestamps = false;
    
}