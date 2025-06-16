<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\CarritoItemsModel;

class Autenticacion extends BaseController
{
    public function registro()
    {
        return view('frontend/registro');
    }

    public function registroPost()
    {
        $reglasValidacion = [
            'nombre'            => 'required|min_length[2]|max_length[40]',
            'apellido'          => 'required|min_length[2]|max_length[30]',
            'username'          => 'required|min_length[3]|max_length[30]|is_unique[usuarios.nom_usuario]',
            'email'             => 'required|valid_email|is_unique[usuarios.email]',
            'password'          => 'required|min_length[6]',
            'password_confirm'  => 'required|matches[password]',
        ];

        if (!$this->validate($reglasValidacion)) {
            return redirect()->to(base_url('public/registro'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $datosUsuario = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'nom_usuario' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol' => 'cliente',
            'baja' => 0
        ];


        $usuariosModel = new UsuariosModel();
        $usuariosModel->insert($datosUsuario);

        return redirect()->to(base_url('public/login'));
    }

    public function login()
    {
        return view('frontend/login');
    }

    public function loginPost()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuarioModel = new UsuariosModel();
        $usuario = $usuarioModel->where('email', $email)->where('baja', 0)->first();

        if (!$usuario || !password_verify($password, $usuario['password'])) {
            return redirect()->to(base_url('public/login'))->withInput()->with('error', 'Email o contraseña incorrectos.');
        }
   
        session()->set([
            'usuario_id' => $usuario['id'],
            'nom_usuario' => $usuario['nom_usuario'],
            'email' => $usuario['email'],
            'rol' => $usuario['rol'],
            'logueado' => true
        ]);

        return redirect()->to(base_url('public/'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('public/'));
    }
}
