<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NoSesionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if ($session->has('usuario_id')) {
            $rol = $session->get('rol');
            if (in_array($rol, ['admin', 'super_admin'])) {
                return redirect()->to(base_url('admin'));
            } else {
                return redirect()->to(base_url(''));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
