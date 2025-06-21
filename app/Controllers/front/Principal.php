<?php

namespace App\Controllers\front;
use App\Controllers\BaseController;


class Principal extends BaseController
{
    public function index(): string
    {

        return view('front/principal');
    }

}
