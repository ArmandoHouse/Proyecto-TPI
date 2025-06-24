<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'apellido',
        'direccion',
        'username',
        'email',
        'password',
        'rol',
        'estado'
    ];

    protected $reglasValidacion = [
        'nombre'            => 'required|min_length[2]|max_length[40]',
        'apellido'          => 'required|min_length[2]|max_length[30]',
        'username'          => 'required|min_length[3]|max_length[30]|is_unique[usuarios.username]',
        'email'             => 'required|valid_email|is_unique[usuarios.email]',
        'password'          => 'required|min_length[6]',
        'password_confirm'  => 'required|matches[password]',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
