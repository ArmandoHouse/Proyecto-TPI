<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;
use App\Models\ContactoModel;
use App\Models\UsuarioModel;


class Contacto extends BaseController
{
    public function index(): string
    {
        $usuario = null;
        if (session('usuario_id')) {
            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->find(session('usuario_id'));
        }

        return view('front/contacto', ['usuario' => $usuario]);
    }

    public function enviar()
    {
        $request = $this->request->getPost();

        $contactoModel = new ContactoModel();
        $contactoModel->insert([
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'telefono' => $request['telefono'] ?? null,
            'asunto' => $request['asunto'],
            'mensaje' => $request['mensaje']
        ]);

        return redirect()->to(base_url('contacto'))->with('mensaje', 'Mensaje enviado correctamente.');
    }
}
