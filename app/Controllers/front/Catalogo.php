<?php

namespace App\Controllers\front;
use App\Controllers\BaseController;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;


class Catalogo extends BaseController
{
    public function ver_catalogo($id)
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();
        
        $categoria = $categoriaModel->find($id);

        if(!$categoria) {
            return redirect()->to(base_url(''))->with('error', 'Categoría no encontrada');
        }
        
        $productos = $productoModel->where('categoria_id', $id)->findAll();

        $data = [
            'productos' => $productos,
            'nombreCategoria' => $categoria['nombre']
        ];

        return view('front/ver_catalogo', $data);
    }

    public function ver_producto($id)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url(''))->with('error', 'Producto no encontrado');
        }
 
        return view('front/ver_producto', ['producto' => $producto]);
    }
}
