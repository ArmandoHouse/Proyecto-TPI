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

    public function actualizar()
    {
        $usuarioModel = new UsuarioModel();
        $usuarioId = session('usuario_id'); // Obtener el ID del usuario desde la sesión

        // Validar los datos del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[30]',
            'nombre' => 'required|min_length[2]|max_length[40]',
            'apellido' => 'required|min_length[2]|max_length[30]',
            'direccion' => 'permit_empty|max_length[100]'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->to(base_url('perfil'))->withInput()->with('errors', $validation->getErrors());
        }

        // Actualizar los datos del usuario
        $datosUsuario = [
            'username' => $this->request->getPost('username'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'direccion' => $this->request->getPost('direccion')
        ];

        if (!$usuarioModel->update($usuarioId, $datosUsuario)) {
            return redirect()->to(base_url('perfil'))->with('error', 'Error al actualizar el perfil.');
        }

        return redirect()->to(base_url('perfil'))->with('mensaje', 'Perfil actualizado correctamente.');
    }
}
