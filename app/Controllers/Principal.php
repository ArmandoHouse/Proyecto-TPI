<?php

namespace App\Controllers;


class Principal extends BaseController
{
    public function index(): string
    {

        return view('frontend/principal');
    }

}
