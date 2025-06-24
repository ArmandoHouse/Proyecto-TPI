<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;

use App\Models\ConsultaModel;
use App\Models\ConsultaMensajeModel;

class Consultas extends BaseController
{
    public function index()
    {
        $consultaModel = new ConsultaModel();

        $consultas = $consultaModel
            ->select('consultas.*, usuarios.nombre, usuarios.apellido, usuarios.email')
            ->join('usuarios', 'usuarios.id = consultas.usuario_id')
            ->findAll();

        return view('back/consultas/index', ['consultas' => $consultas]);
    }

    public function ver($id_consulta)
    {
        $consultaModel = new ConsultaModel();
        $consultaMensajeModel = new ConsultaMensajeModel();

        // Obtener la consulta con los datos del usuario
        $consulta = $consultaModel
            ->select('consultas.*, usuarios.nombre, usuarios.apellido, usuarios.email')
            ->join('usuarios', 'usuarios.id = consultas.usuario_id')
            ->where('consultas.id', $id_consulta)
            ->first();

        // Verificar si la consulta existe
        if (!$consulta) {
            return redirect()->to(base_url('admin/consultas'))->with('error', 'Consulta no encontrada.');
        }

        // Obtener los mensajes relacionados con la consulta
        $mensajes = $consultaMensajeModel
            ->where('consulta_id', $id_consulta)
            ->findAll();

        // Cargar la vista con los datos de la consulta y los mensajes
        return view('back/consultas/ver', [
            'consulta' => $consulta,
            'mensajes' => $mensajes
        ]);
    }

    public function responder($id_consulta)
    {
        $consultaModel = new ConsultaModel();
        $consulta = $consultaModel->find($id_consulta);

        if (!$consulta) {
            return redirect()->back()->with('error', 'Consulta no encontrada.');
        }

        $respuesta = $this->request->getPost('respuesta');

        if (empty($respuesta)) {
            return redirect()->back()->with('error', 'La respuesta no puede estar vacía.');
        }

        $consultaMensajeModel = new ConsultaMensajeModel();
        $consultaMensajeModel->insert([
            'consulta_id' => $id_consulta,
            'usuario_id'  => session()->get('usuario_id'),
            'mensaje'     => $respuesta,
            'fecha'       => date('Y-m-d H:i:s')
        ]);

        $consultaModel->update($id_consulta, ['estado' => 'respondido']);

        return redirect()->to(base_url('admin/consultas'))->with('mensaje', 'Respuesta enviada correctamente.');
    }

    public function cerrar($id)
    {
        $consultaModel = new ConsultaModel();
        $consulta = $consultaModel->find($id);

        if (!$consulta) {
            return redirect()->to(base_url('admin/consultas'))->with('error', 'Consulta no encontrada.');
        }

        if ($consulta['estado'] === 'cerrado') {
            return redirect()->back()->with('info', 'La consulta ya se encuentra cerrada.');
        }

        $consultaModel->update($id, ['estado' => 'cerrado']);

        return redirect()->to(base_url('admin/consultas/ver/' . $id))->with('success', 'Consulta cerrada exitosamente.');
    }
}
