<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;


class Catalogo extends BaseController
{

    private function normalizarPrecio($valor)
    {
        $valor = trim($valor);

        // Si contiene tanto punto como coma
        if (strpos($valor, '.') !== false && strpos($valor, ',') !== false) {
            // Si la coma está después del punto, formato europeo: 1.234,56
            if (strrpos($valor, ',') > strrpos($valor, '.')) {
                // Elimina todos los puntos (miles)
                $valor = str_replace('.', '', $valor);
                // Reemplaza la coma decimal por punto
                $valor = str_replace(',', '.', $valor);
            } else {
                // Formato inglés: 1,234.56
                $valor = str_replace(',', '', $valor);
            }
        } elseif (strpos($valor, ',') !== false) {
            // Solo comas: puede ser miles o decimal europeo
            // Si hay más de una coma, la última es decimal
            $partes = explode(',', $valor);
            if (count($partes) > 1) {
                $decimal = array_pop($partes);
                $entero = implode('', $partes);
                $valor = $entero . '.' . $decimal;
            } else {
                // Solo una coma, puede ser decimal
                $valor = str_replace(',', '.', $valor);
            }
        } elseif (strpos($valor, '.') !== false) {
            // Solo puntos: puede ser miles o decimal inglés
            $partes = explode('.', $valor);
            if (count($partes) > 1) {
                // Si el último grupo tiene 3 dígitos, probablemente es miles, no decimal
                $decimal = array_pop($partes);
                if (strlen($decimal) == 3) {
                    // Miles, no decimal
                    $valor = implode('', $partes) . $decimal;
                } else {
                    // Decimal
                    $valor = implode('', $partes) . '.' . $decimal;
                }
            }
        }
        // Si solo números, sin separadores, queda igual

        return floatval($valor);
    }

    public function ver_catalogo($id = null)
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->where('estado', 'disponible')->findAll();

        // Si hay id, filtra por categoría
        if ($id !== null) {
            $categoria = $categoriaModel->find($id);

            // Si la categoría no existe o está oculta, redirigir o mostrar error
            if (!$categoria || $categoria['estado'] !== 'disponible') {
                return redirect()->to(base_url(''))->with('error', 'Categoría no disponible.');
            }
            $productoModel->where('categoria_id', $id);
        }

        // Filtros desde GET
        $nombre = $this->request->getGet('nombre');
        $precioMin = $this->request->getGet('precio_min');
        $precioMax = $this->request->getGet('precio_max');
        $paginaParam = $this->request->getGet('pagina');
        $porPagina = 6;

        // Filtro por categoría desde GET
        $categoriaFiltro = $this->request->getGet('categoria');
        if ($categoriaFiltro) {
            $productoModel->where('categoria_id', $categoriaFiltro);
        }

        // Normalizar precios
        if ($precioMin !== null && $precioMin !== '') {
            $precioMin = $this->normalizarPrecio($precioMin);
            $productoModel->where('precio >=', $precioMin);
        }
        if ($precioMax !== null && $precioMax !== '') {
            $precioMax = $this->normalizarPrecio($precioMax);
            $productoModel->where('precio <=', $precioMax);
        }

        // Estado disponible
        $productoModel->where('estado', 'disponible');

        if (!empty($nombre)) {
            $productoModel->like('nombre', $nombre);
        }
        if ($precioMin !== null && $precioMin !== '') {
            $productoModel->where('precio >=', (float)$precioMin);
        }
        if ($precioMax !== null && $precioMax !== '') {
            $productoModel->where('precio <=', (float)$precioMax);
        }

        // Ordenar por precio
        $orden = $this->request->getGet('orden');
        $orderField = 'id';
        $orderDirection = 'DESC';

        if ($orden === 'precio_asc') {
            $orderField = 'precio';
            $orderDirection = 'ASC';
        } elseif ($orden === 'precio_desc') {
            $orderField = 'precio';
            $orderDirection = 'DESC';
        }

        // Contar total de productos filtrados
        $totalProductos = $productoModel->countAllResults(false);

        $totalPaginas = ceil($totalProductos / $porPagina);

        // Obtener productos según paginación o "todo"
        if ($paginaParam === 'todo') {
            $productos = $productoModel
                ->orderBy($orderField, $orderDirection)
                ->findAll();
            $paginaActual = 'todo';
        } else {
            $paginaActual = (int)($paginaParam ?? 1);
            $productos = $productoModel
                ->orderBy($orderField, $orderDirection)
                ->paginate($porPagina, 'productos', $paginaActual);
        }

        $pager = \Config\Services::pager();

        return view('front/catalogo', [
            'productos' => $productos,
            'nombreCategoria' => $id ? $categoria['nombre'] : 'Todos los productos',
            'paginaActual' => $paginaActual,
            'totalPaginas' => $totalPaginas,
            'pager' => $pager,
            'categorias' => $categorias
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
