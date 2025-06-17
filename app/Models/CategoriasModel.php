<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriasModel extends Model
{

    protected $table      = 'categorias';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array'; //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'descripcion', 'baja'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = false;

    // Dates
    protected $useTimestamps = false;
}
