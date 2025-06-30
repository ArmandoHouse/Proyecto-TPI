<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SesionValidaFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('logueado') 
        || $session->get('estado') == 'suspendido'
        || !in_array($session->get('rol'), ['cliente'])) {
            return redirect()->to(base_url('/login'))->with('error', 'Debes iniciar sesión o tu cuenta no es válida');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}
