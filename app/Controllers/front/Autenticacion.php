<?php

namespace App\Controllers\front;
use App\Controllers\BaseController;

use App\Models\UsuarioModel;

class Autenticacion extends BaseController
{
    public function registro()
    {
        return view('front/registro');
    }

    public function registroPost()
    {
        $usuarioModel = new UsuarioModel();

        if (!$usuarioModel->validate($this->request->getPost())) {
            return redirect()->to(base_url('registro'))->withInput()->with('errors', $usuarioModel->getErrors());
        }

        $usuario = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol' => 'cliente',
            'estado' => 'activo'
        ];

        $usuarioModel->insert($usuario);

        return redirect()->to(base_url('login'));
    }

    public function login()
    {
        return view('front/login');
    }

    public function loginPost()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('email', $email)->where('estado', 'activo')->first();

        if (!$usuario || !password_verify($password, $usuario['password'])) {
            return redirect()->to(base_url('login'))->withInput()->with('error', 'Email o contraseña incorrectos.');
        }
   
        session()->set([
            'usuario_id' => $usuario['id'],
            'username' => $usuario['username'],
            'email' => $usuario['email'],
            'rol' => $usuario['rol'],
            'logueado' => true
        ]);

        return redirect()->to(base_url(''));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url(''));
    }
}
