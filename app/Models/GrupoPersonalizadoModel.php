<?php
namespace App\Models;

use CodeIgniter\Model;

class GrupoPersonalizadoModel extends Model
{
    protected $table = 'grupos_personalizados';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion'];

    protected $returnType = 'array';
}