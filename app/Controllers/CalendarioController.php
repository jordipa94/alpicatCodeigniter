<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CalendarioModel;

class CalendarioController extends BaseController
{
    public function index()
    {
        $model = new CalendarioModel();
        $data['eventos'] = $model->orderBy('fecha_inicio', 'DESC')->findAll();

        return view('calendario/calendario', $data);
    }

    public function searchEventCrud()
    {
        $keyword = $this->request->getGet('keyword');
        $model = new CalendarioModel();

        if ($keyword) {
            $model->groupStart()
                    ->like('titulo', $keyword)
                    ->orLike('descripcion', $keyword)
                    ->groupEnd();
        }

        $data['eventos'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['keyword'] = $keyword;

        return view('calendario/addEvent', $data);
    }

    public function gestioEvent()
    {
        $model = new CalendarioModel();
        $data['eventos'] = $model->orderBy('fecha_inicio', 'DESC')->findAll();

        return view('calendario/gestioEvent', $data);
    }

    public function viewAddEvent()
    {
        $model = new CalendarioModel();
        $data['eventos'] = $model->orderBy('fecha_inicio', 'DESC')->paginate(6, 'default');
        $data['pager'] = $model->pager;
        
        return view('calendario/addEvent', $data);
        
    }

    public function addEvent()
    {
        $model = new CalendarioModel();

        $rules = [
            'titulo'       => 'required|max_length[255]',
            'descripcion'  => 'permit_empty|max_length[1000]',
            'fecha_inicio' => 'required|valid_date',
            'fecha_fin'    => 'required|valid_date',
            'color'        => 'permit_empty|max_length[20]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'titulo'       => $this->request->getPost('titulo'),
                'descripcion'  => $this->request->getPost('descripcion'),
                'fecha_inicio' => $this->request->getPost('fecha_inicio'),
                'fecha_fin'    => $this->request->getPost('fecha_fin'),
                'color'        => $this->request->getPost('color'),
                'created_at'   => date('Y-m-d H:i:s'),
            ];

            $model->insert($data);

            return redirect()->to('/calendario/addevent')->with('success', 'Evento creado correctamente.');
        }

        return redirect()->back()->withInput()->with('error', 'Error en la validación.');
    }

    public function viewEditEvent($id)
    {
        $model = new CalendarioModel();
        $evento = $model->find($id);

        if (!$evento) {
            return redirect()->to('/calendario/addEvent')->with('error', 'Evento no encontrado.');
        }

        return view('calendario/editEvent', ['evento' => $evento]);
    }

    public function editEvent($id)
    {
        $model = new CalendarioModel();

        $rules = [
            'titulo'       => 'required|max_length[255]',
            'descripcion'  => 'permit_empty|max_length[1000]',
            'fecha_inicio' => 'required|valid_date',
            'fecha_fin'    => 'required|valid_date',
            'color'        => 'permit_empty|max_length[20]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'titulo'       => $this->request->getPost('titulo'),
                'descripcion'  => $this->request->getPost('descripcion'),
                'fecha_inicio' => $this->request->getPost('fecha_inicio'),
                'fecha_fin'    => $this->request->getPost('fecha_fin'),
                'color'        => $this->request->getPost('color'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ];

            $model->update($id, $data);

            return redirect()->to('/calendario/addEvent')->with('success', 'Evento actualizado correctamente.');
        }

        return redirect()->back()->withInput()->with('error', 'Error en la validación.');
    }

    public function deleteEvent($id)
    {
        $model = new CalendarioModel();
        $evento = $model->find($id);

        if (!$evento) {
            return redirect()->back()->with('error', 'Evento no encontrado.');
        }

        $model->delete($id);

        return redirect()->back()->with('success', 'Evento eliminado correctamente.');
    }
}
