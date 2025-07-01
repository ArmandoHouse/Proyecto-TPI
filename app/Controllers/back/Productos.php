<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class Productos extends BaseController
{
    public function productos()
    {
        $request = $this->request;

        $busqueda = $request->getGet('busqueda');
        $categoria = $request->getGet('categoria');

        $productoModel = new ProductoModel();

        if (!empty($busqueda)) {
            $productoModel->like('nombre', $busqueda);
        }

        if (!empty($categoria)) {
            $productoModel->where('categoria_id', $categoria);
        }

        $productos = $productoModel->findAll();

        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll();

        return view('back/productos/index', [
            'productos' => $productos,
            'categorias' => $categorias,
            'busqueda' => $busqueda,
            'categoriaSeleccionada' => $categoria
        ]);
    }

    public function agregarProducto()
    {
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll();

        return view('back/productos/agregar', ['categorias' => $categorias]);
    }

    public function agregarProductoPost()
    {
        $request = $this->request;

        // Validar y procesar imagen
        $imagen = $request->getFile('imagen');
        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('assets/img', $nuevoNombre);
        } else {
            return redirect()->back()->with('error', 'Error al subir la imagen');
        }

        $stock = (int) $request->getPost('stock');
        if ($stock < 1) {
            return redirect()->back()->with('error', 'El stock debe ser un número entero mayor a 0');
        }

        // Guardar en DB
        $productoModel = new ProductoModel();
        $productoModel->insert([
            'nombre'       => $request->getPost('nombre'),
            'descripcion'  => $request->getPost('descripcion'),
            'imagen'       => $nuevoNombre,
            'categoria_id' => $request->getPost('categoria_id'),
            'stock'        => $request->getPost('stock'),
            'precio'       => $request->getPost('precio'),
            'estado'       => $request->getPost('estado')
        ]);

        return redirect()->to(base_url('admin/productos/agregar'))->with('mensaje', 'Producto guardado con éxito');
    }

    public function editarProducto($id)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url('admin/productos'))->with('error', 'Producto no encontrado');
        }

        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->findAll();

        return view('back/productos/editar', ['producto' => $producto, 'categorias' => $categorias]);
    }

    public function editarProductoPost($id)
    {
        $request = $this->request;
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url('admin/productos'))->with('error', 'Producto no encontrado');
        }

        // Validar y procesar imagen
        $imagen = $request->getFile('imagen');

        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('assets/img', $nuevoNombre);
            $producto['imagen'] = $nuevoNombre;
        }

        $producto = [
            'nombre'       => $request->getPost('nombre'),
            'descripcion'  => $request->getPost('descripcion'),
            'precio'       => $request->getPost('precio'),
            'stock'        => $request->getPost('stock'),
            'estado'       => $request->getPost('estado')
        ];

        $productoModel->update($id, $producto);

        return redirect()->to(base_url('admin/productos'))->with('mensaje', 'Producto actualizado con éxito');
    }

    public function eliminarProducto($id)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            return redirect()->to(base_url('admin/productos'))->with('error', 'Producto no encontrado');
        }

        $productoModel->delete($id);

        return redirect()->to(base_url('admin/productos'))->with('mensaje', 'Producto eliminado con éxito');
    }
}
