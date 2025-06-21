<?php

namespace App\Controllers\front;
use App\Controllers\BaseController;

class QuienesSomos extends BaseController
{
    public function index(): string
    {
        return view('front/quienes_somos');
    }

}
