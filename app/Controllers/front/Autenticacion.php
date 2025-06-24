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
        $validation = \Config\Services::validation();

        // Reglas de validación
        $validation->setRules([
            'nombre' => [
                'label' => 'Nombre',
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'El nombre es obligatorio.',
                    'alpha_space' => 'El nombre solo puede contener letras y espacios.'
                ]
            ],
            'apellido' => [
                'label' => 'Apellido',
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'El apellido es obligatorio.',
                    'alpha_space' => 'El apellido solo puede contener letras y espacios.'
                ]
            ],
            'username' => [
                'label' => 'Nombre de Usuario',
                'rules' => 'required|is_unique[usuarios.username]',
                'errors' => [
                    'required' => 'El nombre de usuario es obligatorio.',
                    'is_unique' => 'El nombre de usuario ya está en uso.'
                ]
            ],
            'email' => [
                'label' => 'Correo Electrónico',
                'rules' => 'required|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'El correo electrónico es obligatorio.',
                    'valid_email' => 'Debe proporcionar un correo electrónico válido.',
                    'is_unique' => 'El correo electrónico ya está registrado.'
                ]
            ],
            'password' => [
                'label' => 'Contraseña',
                'rules' => 'required|min_length[8]|max_length[20]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria.',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres.',
                    'max_length' => 'La contraseña no puede exceder los 20 caracteres.'
                ]
            ]
        ]);

        // Validar entrada
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to(base_url('registro'))->withInput()->with('errors', $validation->getErrors());
        }

        // Guardar datos si la validación es exitosa
        $usuarioModel = new UsuarioModel();
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
