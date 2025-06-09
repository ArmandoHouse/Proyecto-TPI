<?php

namespace App\Controllers;

class QuienesSomos extends BaseController
{
    public function index(): string
    {
        return view('frontend/quienes_somos');
    }

}
