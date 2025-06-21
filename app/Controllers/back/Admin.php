<?php

namespace App\Controllers\back;
use App\Controllers\BaseController;

use App\Models\UsuarioModel;


class Admin extends BaseController
{
    public function panel()
    {
        return view('back/panel');
    } 
}
