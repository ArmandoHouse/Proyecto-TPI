<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactoModel extends Model
{

    protected $table      = 'contactos';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'email',
        'asunto',
        'mensaje',
        'estado'
    ];

    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
