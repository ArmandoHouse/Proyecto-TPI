<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\ProductosModel;
use App\Models\UsuariosModel;


class Admin extends BaseController
{
    public function panel()
    {
        return view('backend/panel');
    }

    public function productos()
    {
        $request = $this->request;

        $busqueda = $request->getGet('busqueda');
        $categoria = $request->getGet('categoria');

        $productoModel = new ProductosModel();

        if (!empty($busqueda)) {
            $productoModel->like('nombre', $busqueda);
        }

        if (!empty($categoria)) {
            $productoModel->where('categoria_id', $categoria);
        }

        $productos = $productoModel->findAll();

        $categoriaModel = new CategoriasModel();
        $categorias = $categoriaModel->findAll();

        return view('backend/productos/index', [
            'productos' => $productos,
            'categorias' => $categorias,
            'busqueda' => $busqueda,
            'categoriaSeleccionada' => $categoria
        ]);
    }
    public function agregarProducto()
    {
        $categoriasModel = new CategoriasModel();
        $categorias = $categoriasModel->findAll();

        return view('backend/productos/agregar', ['categorias' => $categorias]);
    }

    public function agregarProductoPost()
    {
        $request = $this->request;

        // Validar y procesar imagen
        $imagen = $request->getFile('imagen');
        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('public/assets/img', $nuevoNombre);
        } else {
            return redirect()->back()->with('error', 'Error al subir la imagen');
        }

        // Guardar en DB
        $productoModel = new ProductosModel();
        $productoModel->insert([
            'nombre'       => $request->getPost('nombre'),
            'descripcion'  => $request->getPost('descripcion'),
            'precio'       => $request->getPost('precio'),
            'categoria_id' => $request->getPost('categoria_id'),
            'imagen'       => $nuevoNombre
        ]);

        return redirect()->to(base_url('public/admin/agregar_producto'))->with('mensaje', 'Producto guardado con éxito');
    }

    public function editarProducto($id)
    {
        $productosModel = new ProductosModel();
        $producto = $productosModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url('public/admin/productos'))->with('error', 'Producto no encontrado');
        }

        $categoriasModel = new CategoriasModel();
        $categorias = $categoriasModel->findAll();

        return view('backend/productos/editar', ['producto' => $producto, 'categorias' => $categorias]);
    }

    public function editarProductoPost($id)
    {
        $request = $this->request;
        $productosModel = new ProductosModel();
        $producto = $productosModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url('public/admin/productos'))->with('error', 'Producto no encontrado');
        }

        // Validar y procesar imagen
        $imagen = $request->getFile('imagen');

        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('public/assets/img', $nuevoNombre);
            $producto['imagen'] = $nuevoNombre;
        }

        $producto = [
            'nombre'       => $request->getPost('nombre'),
            'descripcion'  => $request->getPost('descripcion'),
            'precio'       => $request->getPost('precio'),
            'stock'        => $request->getPost('stock'),
            'baja'         => (bool)$request->getPost('baja'),
        ];

        $productosModel->update($id, $producto);

        return redirect()->to(base_url('public/admin/productos'))->with('mensaje', 'Producto actualizado con éxito');
    }

    public function eliminarProducto($id)
    {
        $productosModel = new ProductosModel();
        $producto = $productosModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url('public/admin/productos'))->with('error', 'Producto no encontrado');
        }

        $productosModel->delete($id);

        return redirect()->to(base_url('public/admin/productos'))->with('mensaje', 'Producto eliminado con éxito');
    }

    public function usuarios()
    {
        $usuariosModel = new UsuariosModel();


        $nombre = $this->request->getGet('nombre');
        $rol = $this->request->getGet('rol');
        $estado = $this->request->getGet('estado');

        // Aplicar filtros a la consulta
        if (!empty($nombre)) {
            $usuariosModel->groupStart()
                ->like('nom_usuario', $nombre)
                ->orLike('nombre', $nombre)
                ->orLike('apellido', $nombre)
                ->groupEnd();
        }

        if (!empty($rol)) {
            $usuariosModel->where('rol', $rol);
        }

        if ($estado === 'activo') {
            $usuariosModel->where('baja', 0);
        } elseif ($estado === 'suspendido') {
            $usuariosModel->where('baja', 1);
        }

        $usuarios = $usuariosModel->findAll();

        $roles = ['cliente', 'admin'];

        return view('backend/usuarios/index', [
            'usuarios' => $usuarios,
            'nombre' => $nombre,
            'rolSeleccionado' => $rol,
            'estadoSeleccionado' => $estado,
            'roles' => $roles
        ]);
    }

    public function activarUsuario($id)
    {
        $usuariosModel = new UsuariosModel();
        $usuario = $usuariosModel->find($id);

        if (!$usuario) {
            return redirect()->to(base_url('public/admin/usuarios'))->with('error', 'Usuario no encontrado');
        }

        $usuariosModel->update($id, ['baja' => 0]);

        return redirect()->to(base_url('public/admin/usuarios'))->with('mensaje', 'Usuario activado con éxito');
    }

    public function suspenderUsuario($id)
    {
        $usuariosModel = new UsuariosModel();
        $usuario = $usuariosModel->find($id);

        if (!$usuario) {
            return redirect()->to(base_url('public/admin/usuarios'))->with('error', 'Usuario no encontrado');
        }

        $usuariosModel->update($id, ['baja' => 1]);

        return redirect()->to(base_url('public/admin/usuarios'))->with('mensaje', 'Usuario suspendido con éxito');
    }

    public function eliminarUsuario($id)
    {
        $usuariosModel = new UsuariosModel();
        $usuario = $usuariosModel->find($id);

        if (!$usuario) {
            return redirect()->to(base_url('public/admin/usuarios'))->with('error', 'Usuario no encontrado');
        }

        $usuariosModel->delete($id);

        return redirect()->to(base_url('public/admin/usuarios'))->with('mensaje', 'Usuario eliminado con éxito');
    }
}
