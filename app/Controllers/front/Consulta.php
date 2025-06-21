<?php

namespace App\Controllers\front;

use App\Controllers\BaseController;
use App\Models\ConsultaModel;
use App\Models\ConsultaMensajeModel;


class Consulta extends BaseController
{
    public function index()
    {
        $consultaModel = new ConsultaModel();
        $consultas = $consultaModel->where('usuario_id', session()->get('usuario_id'))->findAll();

        return view('front/consultas/index', ['consultas' => $consultas]);
    }

    public function crear()
    {
        return view('front/consultas/crear');
    }

    public function crearPost()
    {
        $request = $this->request;

        // Validación simple de ejemplo
        $rules = [
            'titulo'   => 'required',
            'descripcion'  => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Guardar la consulta
        $consultaModel = new ConsultaModel();
        $consultaModel->insert([
            'usuario_id' => session()->get('usuario_id'),
            'asunto'     => $request->getPost('titulo'),
            'mensaje'    => $request->getPost('descripcion'),
            'estado'     => 'pendiente'
        ]);

        return redirect()->to(base_url('consultas/crear'))->with('success', 'Consulta enviada correctamente.');
    }

    public function ver($id_consulta)
    {
        $consultaModel = new ConsultaModel();
        $consulta = $consultaModel->find($id_consulta);

        $consultaMensajeModel = new ConsultaMensajeModel();
        $mensajes = $consultaMensajeModel->where('consulta_id', $id_consulta)->findAll();

        if (!$consulta || $consulta['usuario_id'] != session()->get('usuario_id')) {
            return redirect()->to(base_url('consulta'))->with('error', 'Consulta no encontrada.');
        }

        return view('front/consultas/ver', ['consulta' => $consulta, 'mensajes' => $mensajes]);
    }

    public function responderPost($id_consulta)
    {
        $request = $this->request;        

        $consultaMensajeModel = new ConsultaMensajeModel();
        $consultaMensajeModel->insert([
            'consulta_id' => $id_consulta,
            'usuario_id'  => session()->get('usuario_id'),
            'mensaje'     => $request->getPost('mensaje'),
            'fecha'       => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('consultas/ver/' . $id_consulta))->with('success', 'Respuesta enviada correctamente.');
    }
}
