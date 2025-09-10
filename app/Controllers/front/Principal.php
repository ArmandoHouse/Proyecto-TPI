<?php

namespace App\Controllers\front;
use App\Controllers\BaseController;


class Principal extends BaseController
{
    public function index()
    {
        $productoModel = new \App\Models\ProductoModel();
        $productos = $productoModel->where('estado', 'disponible')->findAll();

        return view('front/principal', [
            'productos' => $productos
        ]);
    }

}
