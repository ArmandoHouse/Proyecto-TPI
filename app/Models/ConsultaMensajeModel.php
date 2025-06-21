<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaMensajeModel extends Model
{
    protected $table = 'consultas_mensajes';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'consulta_id',
        'usuario_id',
        'mensaje',
        'fecha'
    ];
}
