<?php

namespace App\Controllers;

class EnviosYPagos extends BaseController
{
    public function index(): string
    {
        return view('envios_y_pagos/index');
    }

}
