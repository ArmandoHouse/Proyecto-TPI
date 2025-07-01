<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;

use App\Models\CategoriaModel;

class Categorias extends BaseController
{

    public function index()
    {
        $categoriaModel = new CategoriaModel();

        // Obtener filtros desde GET
        $nombre = $this->request->getGet('nombre');
        $estado = $this->request->getGet('estado');
        $id     = $this->request->getGet('id');

        $builder = $categoriaModel;

        if ($nombre) {
            $builder = $builder->like('nombre', $nombre);
        }
        if ($estado) {
            $builder = $builder->where('estado', $estado);
        }
        if ($id) {
            $builder = $builder->where('id', $id);
        }

        $data['categorias'] = $builder->findAll();

        // Pasar los filtros a la vista para mantener los valores en los inputs
        $data['filtros'] = [
            'nombre' => $nombre,
            'estado' => $estado,
            'id'     => $id,
        ];

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
        $estado = $this->request->getPost('estado'); // <-- Agrega esto

        // Validar que el nombre no esté vacío
        if (empty($nombre)) {
            return redirect()->back()->with('error', 'El nombre de la categoría es obligatorio.');
        }

        $categoriaModel->update($id, [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'estado' => $estado
        ]);

        return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel->find($id);

        if (!$categoria) {
            return redirect()->to(base_url('admin/categorias'))->with('error', 'Categoría no encontrada.');
        }

        $categoriaModel->delete($id);

        return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría eliminada correctamente.');
    }
}
