<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model {

    protected $table      = 'carrito_items';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array'; //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario_id', 'producto_id', 'cantidad'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = false;

    // Dates
    protected $useTimestamps = false;
    
}