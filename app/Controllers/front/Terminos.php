<?php

namespace App\Controllers\front;
use App\Controllers\BaseController;

class Terminos extends BaseController
{
    public function index(): string
    {
        return view('front/terminos');
    }

}
