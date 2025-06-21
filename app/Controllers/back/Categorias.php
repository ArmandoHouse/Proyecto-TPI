<?php

namespace App\Controllers\back;
use App\Controllers\BaseController;

use App\Models\CategoriaModel;

class Categorias extends BaseController
{    
    
    public function index() {
        $categoriaModel = new CategoriaModel();

        $data['categorias'] = $categoriaModel->findAll();

        return view('back/categorias/index', $data);
    }

    public function agregarCategoria()
    {
        return view('back/categorias/cargar');
    }

    public function agregarCategoriaPost()
    {
        $request = $this->request;
        $categoriaModel = new CategoriaModel();

        // Obtener el nombre de la categoría desde el formulario
        $nombre = $request->getPost('nombre');

        // Validar que el nombre no esté vacío
        if (empty($nombre)) {
            return redirect()->back()->with('error', 'El nombre de la categoría es obligatorio.');
        }

         // Buscar si existe una categoría con ese nombre (aunque esté dada de baja)
        $existente = $categoriaModel->where('nombre', $nombre)->first();

        if ($existente) {
            if ($existente['estado'] == 'oculto') {
                // Reactivar si estaba dada de baja
                $categoriaModel->update($existente['id'], ['estado' => 'activo']);
                return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría reactivada.');
            } else {
                return redirect()->back()->with('error', 'Ya existe una categoría con ese nombre.');
            }
        }

        // Guardar en la base de datos
        $categoriaModel->insert([
            'nombre'       => $nombre,
            'descripcion'  => $request->getPost('descripcion')
        ]);

        return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría guardada con éxito.');
    }

    public function activar($id)
    {
        $categoriaModel = new CategoriaModel();
        $categoriaModel->update($id, ['estado' => 'disponible']);

        return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría activada correctamente');
    }

    public function ocultar($id)
    {
        $categoriaModel = new CategoriaModel();

        $categoriaModel->update($id, ['estado' => 'oculto']);

        return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría ocultada correctamente');
    }

    public function eliminar($id)
    {
        $categoriaModel = new CategoriaModel();

        $categoriaModel->delete($id);

        return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría eliminada correctamente');
    }

    public function inactivas()
    {
        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->where('estado', 'oculto')->findAll();
        $data['inactivas'] = true;

        return view('back/categorias/index', $data);
    }

    public function editar($id)
    {
        $categoriaModel = new CategoriaModel();
        $data['categoria'] = $categoriaModel->find($id);

        if (!$data['categoria']) {
            return redirect()->to(base_url('admin/categorias'))->with('error', 'Categoría no encontrada.');
        }

        return view('back/categorias/editar', $data);
    }

    public function editarPost($id)
    {
        $categoriaModel = new CategoriaModel();
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

        return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría actualizada correctamente.');
    }

}