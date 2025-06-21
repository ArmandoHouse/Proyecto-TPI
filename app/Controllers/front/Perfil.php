<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;

use App\Models\UsuarioModel;


class Perfil extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find(session('usuario_id'));

        return view('front/perfil', ['usuario' => $usuario]);
    }

 
}
