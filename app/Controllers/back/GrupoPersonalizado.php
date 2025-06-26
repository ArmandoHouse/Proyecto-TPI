<?php
namespace App\Controllers\back;

use App\Controllers\BaseController;
use App\Models\GrupoPersonalizadoModel;
use App\Models\GrupoPersonalizadoProductoModel;
use App\Models\ProductoModel;

class GrupoPersonalizado extends BaseController
{
    public function index()
    {
        $grupoModel = new GrupoPersonalizadoModel();
        $grupos = $grupoModel->findAll();
        return view('back/grupos/index', ['grupos' => $grupos]);
    }

    public function crear()
    {
        return view('back/grupos/crear');
    }

    public function crearPost()
    {
        $grupoModel = new GrupoPersonalizadoModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion')
        ];
        
        if ($grupoModel->insert($data)) {
            return redirect()->to(base_url('admin/grupos'))->with('success', 'Grupo creado exitosamente.');
        } else {
            return redirect()->back()->withInput()->with('errors', $grupoModel->errors());
        }
    }

    public function editar($id)
    {
        $grupoModel = new GrupoPersonalizadoModel();
        $grupo = $grupoModel->find($id);
        
        if (!$grupo) {
            return redirect()->to(base_url('admin/grupos'))->with('error', 'Grupo no encontrado.');
        }
        
        return view('back/grupos/editar', ['grupo' => $grupo]);
    }

    public function editarPost($id)
{
    $grupoModel = new GrupoPersonalizadoModel();
    $data = [
        'nombre' => $this->request->getPost('nombre'),
        'descripcion' => $this->request->getPost('descripcion')
    ];

    if ($grupoModel->update($id, $data)) {
        return redirect()->to(base_url('admin/grupos'))->with('success', 'Grupo actualizado exitosamente.');
    } else {
        return redirect()->back()->withInput()->with('errors', $grupoModel->errors());
    }
}


public function eliminar($id)
{
    $grupoModel = new GrupoPersonalizadoModel();

    if ($grupoModel->delete($id)) {
        return redirect()->to(base_url('admin/grupos'))->with('success', 'Grupo eliminado exitosamente.');
    } else {
        return redirect()->to(base_url('admin/grupos'))->with('error', 'No se pudo eliminar el grupo.');
    }
}

public function agregarProducto($id)
{
    $grupoModel = new GrupoPersonalizadoModel();
    $productoModel = new ProductoModel();
    $grupoProductoModel = new GrupoPersonalizadoProductoModel();

    $grupo = $grupoModel->find($id);
    if (!$grupo) {
        return redirect()->to(base_url('admin/grupos'))->with('error', 'Grupo no encontrado.');
    }

    if ($this->request->getMethod() === 'post') {
        // Elimina productos actuales del grupo
        $grupoProductoModel->where('grupo_id', $id)->delete();

        // Agrega los nuevos productos seleccionados
        $productos = $this->request->getPost('productos');
        if ($productos && is_array($productos)) {
            foreach ($productos as $productoId) {
                $grupoProductoModel->insert([
                    'grupo_id' => $id,
                    'producto_id' => $productoId
                ]);
            }
        }
        return redirect()->to(base_url('admin/grupos'))->with('success', 'Productos actualizados en el grupo.');
    }

    $productos = $productoModel->findAll();
    $productosGrupo = $grupoProductoModel->where('grupo_id', $id)->findColumn('producto_id');

    return view('back/grupos/agregar_producto', [
        'grupo' => $grupo,
        'productos' => $productos,
        'productosGrupo' => $productosGrupo ?? []
    ]);
}



}



