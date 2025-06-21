<?php

namespace App\Controllers\front;
use App\Controllers\BaseController;

class Comercializacion extends BaseController
{
    public function index(): string
    {
        return view('front/comercializacion');
    }

}
