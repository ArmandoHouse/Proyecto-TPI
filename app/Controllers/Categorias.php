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
        if (session()->get('rol') !== 'admin') {
            return redirect()->to('public/admin');
        }

        return view('admin/categorias/cargar');
    }

    public function cargarCategoria()
    {
        $request = $this->request;

        // Verificamos que sea admin
        if (session()->get('rol') !== 'admin') {
            return redirect()->to('public/');
        }

         // Buscar si existe una categoría con ese nombre (aunque esté dada de baja)
        $existente = $categoriaModel->where('nombre', $nombre)->first();

        if ($existente) {
            if ($existente['baja'] == 1) {
                // Reactivar si estaba dada de baja
                $categoriaModel->update($existente['id'], ['baja' => 0]);
                return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría reactivada.');
            } else {
                return redirect()->back()->with('error', 'Ya existe una categoría con ese nombre.');
            }
        }


        // Guardar en DB
        $categoriaModel = new CategoriasModel();
        $categoriaModel->insert([
            'nombre'       => $request->getPost('nombre'),
            'descripcion'  => $request->getPost('descripcion')
        ]);

        return redirect()->to(base_url('public/admin/categorias'))->with('mensaje', 'Categoria guardada con éxito');
    }

    public function eliminar($id)
    {
        if (session()->get('rol') !== 'admin') {
            return redirect()->to('/');
        }

        $categoriaModel = new \App\Models\CategoriasModel();

        $categoriaModel->update($id, ['baja' => 1]);

        return redirect()->to(base_url('public/admin/categorias'))->with('success', 'Categoría dada de baja correctamente');
    }

    public function reactivar($id)
    {
        if (session()->get('rol') !== 'admin') {
            return redirect()->to('/');
        }

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

}