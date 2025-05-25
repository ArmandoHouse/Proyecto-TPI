<?php

namespace App\Controllers;
use App\Models\ProductosModel;

class Catalogo extends BaseController
{
    public function index(): string
    {
        $productosModel = new ProductosModel();
        $resultado = $productosModel->findAll();

        $data = ['productos' => $resultado];

        return view('catalogo', $data);
    }


    public function ver_producto($id) {
        $productosModel = new ProductosModel();
        $producto = $productosModel->find($id);

        $data = ['producto' => $producto];

        return view('ver_producto', $data);
    }

}
