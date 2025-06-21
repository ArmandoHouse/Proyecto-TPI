<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;

use App\Models\ContactoModel;

class Contactos extends BaseController
{
    public function index()
    {
        $contactoModel = new ContactoModel();

        $contactos = $contactoModel->findAll();

        return view('back/contactos/index', ['contactos' => $contactos]);
    }

    public function ver($id_contacto)
    {
        $contactoModel = new ContactoModel();
        $contacto = $contactoModel->find($id_contacto);

        if (!$contacto) {
            return redirect()->back()->with('error', 'Contacto no encontrado');
        }

        return view('back/contactos/ver', ['contacto' => $contacto]);
    }

    public function cambiarEstado($id_contacto)
    {
        $contactoModel = new ContactoModel();
        $contacto = $contactoModel->find($id_contacto);

        if (!$contacto) {
            return redirect()->back()->with('error', 'Contacto no encontrado.');
        }

        $nuevoEstado = $this->request->getPost('estado');

        if (!in_array($nuevoEstado, ['respondido', 'cerrado'])) {
            return redirect()->back()->with('error', 'Estado inválido.');
        }

        $contactoModel->update($id_contacto, ['estado' => $nuevoEstado]);

        return redirect()->to(base_url('admin/contactos/ver/' . $id_contacto))->with('success', 'Estado actualizado.');
    }
}
