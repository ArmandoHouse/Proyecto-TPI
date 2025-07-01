<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NoAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (in_array($session->get('rol'), ['admin', 'super_admin'])) {
            return redirect()->to(base_url('admin'));
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
