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

    public function ver_catalogo($id)
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        $categoria = $categoriaModel->find($id);

        if (!$categoria) {
            return redirect()->to(base_url(''))->with('error', 'Categoría no encontrada');
        }

        // Filtros desde GET
        $nombre = $this->request->getGet('nombre');
        $precioMin = $this->request->getGet('precio_min');
        $precioMax = $this->request->getGet('precio_max');
        $paginaParam = $this->request->getGet('pagina');
        $porPagina = 6;

        // Normalizar precios
        if ($precioMin !== null && $precioMin !== '') {
            $precioMin = $this->normalizarPrecio($precioMin);
            $productoModel->where('precio >=', $precioMin);
        }
        if ($precioMax !== null && $precioMax !== '') {
            $precioMax = $this->normalizarPrecio($precioMax);
            $productoModel->where('precio <=', $precioMax);
        }

        // Construir la consulta con filtros
        $productoModel->where('categoria_id', $id)
            ->where('estado', 'disponible');

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

        if ($orden === 'precio_asc') {
            $productoModel->orderBy('precio', 'ASC');
        } elseif ($orden === 'precio_desc') {
            $productoModel->orderBy('precio', 'DESC');
        } else {
            $productoModel->orderBy('id', 'DESC'); // Orden por defecto
        }

        // Contar total de productos filtrados
        $totalProductos = $productoModel->countAllResults(false);

        $totalPaginas = ceil($totalProductos / $porPagina);

        // Obtener productos según paginación o "todo"
        if ($paginaParam === 'todo') {
            $productos = $productoModel
                ->orderBy('id', 'DESC')
                ->findAll();
            $paginaActual = 'todo';
        } else {
            $paginaActual = (int)($paginaParam ?? 1);
            $productos = $productoModel
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
