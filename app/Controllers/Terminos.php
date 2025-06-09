<?php

namespace App\Controllers;

class Terminos extends BaseController
{
    public function index(): string
    {
        return view('frontend/terminos');
    }

}
