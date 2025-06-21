<?php

namespace app\Controllers\back;

use App\Controllers\BaseController;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    public function usuarios()
    {
        $usuarioModel = new UsuarioModel();

        $nombre = $this->request->getGet('nombre');
        $rol = $this->request->getGet('rol');
        $estado = $this->request->getGet('estado');

        // Aplicar filtros a la consulta
        if (!empty($nombre)) {
            $usuarioModel->groupStart()
                ->like('username', $nombre)
                ->orLike('nombre', $nombre)
                ->orLike('apellido', $nombre)
                ->groupEnd();
        }

        if (!empty($rol)) {
            $usuarioModel->where('rol', $rol);
        }

        if ($estado === 'activo') {
            $usuarioModel->where('estado', 'activo');
        } elseif ($estado === 'suspendido') {
            $usuarioModel->where('estado', 'suspendido');
        }

        $usuarios = $usuarioModel->findAll();

        $roles = ['cliente', 'admin', 'super_admin'];

        return view('back/usuarios/index', [
            'usuarios' => $usuarios,
            'nombre' => $nombre,
            'rolSeleccionado' => $rol,
            'estadoSeleccionado' => $estado,
            'roles' => $roles
        ]);
    }

    public function activarUsuario($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to(base_url('admin/usuarios'))->with('error', 'Usuario no encontrado');
        }

        $usuarioModel->update($id, ['estado' => 'activo']);

        return redirect()->to(base_url('admin/usuarios'))->with('mensaje', 'Usuario activado con éxito');
    }

    public function suspenderUsuario($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to(base_url('admin/usuarios'))->with('error', 'Usuario no encontrado');
        }

        $usuarioModel->update($id, ['estado' => 'suspendido']);

        return redirect()->to(base_url('admin/usuarios'))->with('mensaje', 'Usuario suspendido con éxito');
    }

    public function eliminarUsuario($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to(base_url('admin/usuarios'))->with('error', 'Usuario no encontrado');
        }

        $usuarioModel->delete($id);

        return redirect()->to(base_url('admin/usuarios'))->with('mensaje', 'Usuario eliminado con éxito');
    }
}
