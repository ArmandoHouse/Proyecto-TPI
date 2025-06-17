<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\CategoriasModel;


class Catalogo extends BaseController
{
    public function ver_catalogo($id)
    {
        $productosModel = new ProductosModel();
        $categoriasModel = new CategoriasModel();
        
        $categoria = $categoriasModel->find($id);

        if(!$categoria) {
            return redirect()->to(base_url('public/'))->with('error', 'Categoría no encontrada');
        }
        
        $productos = $productosModel->where('categoria_id', $id)->findAll();

        $data = [
            'productos' => $productos,
            'nombreCategoria' => $categoria['nombre']
        ];

        return view('frontend/ver_catalogo', $data);
    }

    public function ver_producto($id)
    {
        $productosModel = new ProductosModel();
        $producto = $productosModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url('public/'))->with('error', 'Producto no encontrado');
        }
 
        return view('frontend/ver_producto', ['producto' => $producto]);
    }
}
