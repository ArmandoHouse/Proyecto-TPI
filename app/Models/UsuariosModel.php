<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model {

    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array'; //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'apellido', 'nom_usuario', 'email', 'password', 'rol', 'baja'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = false;

    // Dates
    protected $useTimestamps = false;
    
}