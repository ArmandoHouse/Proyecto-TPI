<?php

namespace App\Controllers;

class Autenticacion extends BaseController
{
    public function registrarse(): string
    {
        return view('registro');
    }

    public function login(): string 
    {
        return view('login');
    }

}
