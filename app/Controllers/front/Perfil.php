<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Perfil extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $usuarioId = session('usuario_id'); // Obtener el ID del usuario desde la sesión

        // Verificar si el usuario existe
        $usuario = $usuarioModel->find($usuarioId);
        if (!$usuario) {
            return redirect()->to(base_url('login'))->with('error', 'Usuario no encontrado.');
        }

        // Pasar los datos del usuario a la vista
        return view('front/perfil', ['usuario' => $usuario]);
    }
}
