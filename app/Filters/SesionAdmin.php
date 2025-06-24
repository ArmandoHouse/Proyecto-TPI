<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SesionAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        

        // Verificar si el usuario tiene el rol adecuado
        if (!in_array($session->get('rol'), ['admin', 'super_admin'])) {
            return redirect()->to(base_url('login'))->with('error', 'Tu cuenta no tiene permisos suficientes para acceder al panel de administración.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se requiere lógica adicional después de la solicitud
    }
}
