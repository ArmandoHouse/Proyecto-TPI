<?php

namespace App\Controllers;

use App\Models\CategoriasModel;

class Admin extends BaseController
{
    public function cargarProducto()
    {
        // Verificamos si es admin
        if (session()->get('rol') !== 'admin') {
            return redirect()->to('public/')->with('mensaje', 'Acceso denegado');
        }

        $categoriaModel = new CategoriasModel();
        $categorias = $categoriaModel->findAll();

        return view('admin/cargar_producto', ['categorias' => $categorias]);
    }

    public function guardarProducto()
    {
        $request = $this->request;

        // Verificamos que sea admin
        if (session()->get('rol') !== 'admin') {
            return redirect()->to('/');
        }

        // Validar y procesar imagen
        $imagen = $request->getFile('imagen');
        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('public/assets/img', $nuevoNombre);
        } else {
            return redirect()->back()->with('error', 'Error al subir la imagen');
        }

        // Guardar en DB
        $productoModel = new ProductoModel();
        $productoModel->insert([
            'nombre'       => $request->getPost('nombre'),
            'descripcion'  => $request->getPost('descripcion'),
            'precio'       => $request->getPost('precio'),
            'categoria_id' => $request->getPost('categoria_id'),
            'imagen'       => $nuevoNombre
        ]);

        return redirect()->to(base_url('public/admin/cargar-producto'))->with('mensaje', 'Producto guardado con éxito');
    }
}
