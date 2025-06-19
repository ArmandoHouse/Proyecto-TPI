<?php

namespace App\Controllers;

use App\Models\CategoriasModel;

class Categorias extends BaseController
{
    
    
    public function index() {
        $categoriaModel = new CategoriasModel();

        $data['categorias'] = $categoriaModel->where('baja', 0)->findAll();

        return view('admin/categorias/index', $data);
    }

    public function nueva()
    {

        return view('admin/categorias/cargar');
    }

    public function cargarCategoria()
    {
        $request = $this->request;
        $categoriaModel = new CategoriasModel();

        // Obtener el nombre de la categoría desde el formulario
        $nombre = $request->getPost('nombre');

        // Validar que el nombre no esté vacío
        if (empty($nombre)) {
            return redirect()->back()->with('error', 'El nombre de la categoría es obligatorio.');
        }

         // Buscar si existe una categoría con ese nombre (aunque esté dada de baja)
        $existente = $categoriaModel->where('nombre', $nombre)->first();

        if ($existente) {
            if ($existente['baja'] == 1) {
                // Reactivar si estaba dada de baja
                $categoriaModel->update($existente['id'], ['baja' => 0]);
                return redirect()->to(base_url('public/admin/categorias'))->with('success', 'Categoría reactivada.');
            } else {
                return redirect()->back()->with('error', 'Ya existe una categoría con ese nombre.');
            }
        }

        // Guardar en la base de datos
        $categoriaModel->insert([
            'nombre'       => $nombre,
            'descripcion'  => $request->getPost('descripcion')
        ]);

        return redirect()->to(base_url('public/admin/categorias'))->with('success', 'Categoría guardada con éxito.');
    }

    public function eliminar($id)
    {

        $categoriaModel = new \App\Models\CategoriasModel();

        $categoriaModel->update($id, ['baja' => 1]);

        return redirect()->to(base_url('public/admin/categorias'))->with('success', 'Categoría dada de baja correctamente');
    }

    public function reactivar($id)
    {
        $categoriaModel = new \App\Models\CategoriasModel();
        $categoriaModel->update($id, ['baja' => 0]);

        return redirect()->to(base_url('public/admin/categorias'))->with('success', 'Categoría reactivada correctamente');
    }

    public function inactivas()
    {
        $categoriaModel = new \App\Models\CategoriasModel();
        $data['categorias'] = $categoriaModel->where('baja', 1)->findAll();
        $data['inactivas'] = true;

        return view('admin/categorias/index', $data);
    }

    public function editar($id)
    {
        $categoriaModel = new \App\Models\CategoriasModel();
        $data['categoria'] = $categoriaModel->find($id);

        if (!$data['categoria']) {
            return redirect()->to(base_url('public/admin/categorias'))->with('error', 'Categoría no encontrada.');
        }

        return view('admin/categorias/editar', $data);
    }

    public function editarPost($id)
    {
        $categoriaModel = new \App\Models\CategoriasModel();
        $nombre = $this->request->getPost('nombre');
        $descripcion = $this->request->getPost('descripcion');

        // Validar que el nombre no esté vacío
        if (empty($nombre)) {
            return redirect()->back()->with('error', 'El nombre de la categoría es obligatorio.');
        }

        $categoriaModel->update($id, [
            'nombre' => $nombre,
            'descripcion' => $descripcion
        ]);

        return redirect()->to(base_url('public/admin/categorias'))->with('success', 'Categoría actualizada correctamente.');
    }

}