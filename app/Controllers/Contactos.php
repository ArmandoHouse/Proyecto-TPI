<?php

namespace App\Controllers;

class Contactos extends BaseController
{
    public function index(): string
    {
        return view('contacto/index');
    }

}
