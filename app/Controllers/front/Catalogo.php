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

        if (!$categoria) {
            return redirect()->to(base_url(''))->with('error', 'Categoría no encontrada');
        }

        // Obtener número de página actual (desde GET)
        $paginaParam = $this->request->getGet('pagina');
        $porPagina = 6; // Cantidad de productos por página

        // Obtener el total de productos de esta categoría
        $totalProductos = $productoModel->where('categoria_id', $id)->countAllResults();

        // Calcular total de páginas
        $totalPaginas = ceil($totalProductos / $porPagina);

        // Si la página es 'todo', mostrar todos los productos de la categoría
        if ($paginaParam === 'todo') {
            $productos = $productoModel
                ->where('categoria_id', $id)
                ->orderBy('id', 'DESC')
                ->findAll();
            $paginaActual = 'todo';
        } else {
            $paginaActual = (int)($paginaParam ?? 1);
            $productos = $productoModel
                ->where('categoria_id', $id)
                ->orderBy('id', 'DESC')
                ->paginate($porPagina, 'productos', $paginaActual);
        }

        $pager = \Config\Services::pager();

        return view('front/catalogo', [
            'productos' => $productos,
            'nombreCategoria' => $categoria['nombre'],
            'paginaActual' => $paginaActual,
            'totalPaginas' => $totalPaginas,
            'pager' => $pager
        ]);
    }

    public function ver_producto($id)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url(''))->with('error', 'Producto no encontrado');
        }

        return view('front/producto', ['producto' => $producto]);
    }
}
