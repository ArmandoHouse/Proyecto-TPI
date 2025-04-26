<?php

namespace App\Controllers;

class QuienesSomos extends BaseController
{
    public function index(): string
    {
        return view('quienes_somos');
    }

}
