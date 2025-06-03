<?php

namespace App\Controllers;
use App\Models\UsuariosModel;

class Autenticacion extends BaseController
{

    public function registrarse(): string
    {
        return view('registro');
    }

    public function login(): string 
    {
        return view('login');
    }

    public function loginPost()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuarioModel = new UsuariosModel();
        $usuario = $usuarioModel
            ->where('email', $email)
            ->where('baja', 0) // Solo usuarios activos
            ->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            // Login exitoso
            $session = session();
            $session->set([
                'usuario_id' => $usuario['id'],
                'nom_usuario' => $usuario['nom_usuario'],
                'email' => $usuario['email'],
                'rol' => $usuario['rol'],
                'logueado' => true
            ]);

            return redirect()->to(base_url('public/'));
        } else {
            // Error de login
            return redirect()->back()->withInput()->with('error', 'Email o contraseña incorrectos.');
        }
    }

    public function registrarsePost()
    {
        helper(['form']);

        // Validación básica
        $validationRules = [
            'nombre'            => 'required|min_length[2]',
            'apellido'          => 'required|min_length[2]',
            'username'          => 'required|min_length[3]|is_unique[usuarios.nom_usuario]',
            'email'             => 'required|valid_email|is_unique[usuarios.email]',
            'password'          => 'required|min_length[6]',
            'password_confirm'  => 'required|matches[password]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Si pasa validación
        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'apellido'   => $this->request->getPost('apellido'),
            'nom_usuario'=> $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol'        => 'cliente', 
            'baja'       => 0
        ];

        $usuarioModel = new UsuariosModel();
        $usuarioModel->insert($data);

        return redirect()->to(base_url('public/login'))->with('success', 'Cuenta creada correctamente. Ahora puedes iniciar sesión.');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();  

        return redirect()->to(base_url('public/')); 
    }

}
