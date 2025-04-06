<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ContacteModel;

class ContacteController extends BaseController
{
    public function index()
    {
        echo view("contacte/contacte");
    }

    public function enviarFormulariContacte()
    {

        $model = new ContacteModel();

        $validationRules = [
            'concepte' => 'required|max_length[255]',
            'missatge' => 'required',
            'telefono' => 'required',
            'correu' => 'required',
        ];

        if ($this->validate($validationRules)) {

            $concepte = $this->request->getPost('concepte');
            $missatge = $this->request->getPost('missatge');
            $telefono = $this->request->getPost('telefono');
            $correu = $this->request->getPost('correu');

            $model->insert(["concepte" => $concepte, "missatge" => $missatge,
                "telefono" => $telefono, "correu" => $correu]);

            return redirect()->to('/contacte')->with('success', 'Missatge enviat correctament!');

        } else {
            return redirect()->back()->withInput();
        }
        
    }

    public function gestionarContacte()
    {

        $contacteModel = new ContacteModel();

        $data['missatges'] = $contacteModel->orderBy('created_at', 'DESC')->paginate(6, 'default');
        $data['pager'] = $contacteModel->pager;

        echo view('/contacte/gestioContacte', $data);

    }

    public function readContactForm($id)
    {
        $contacteModel = new ContacteModel();

        $data['missatge'] = $contacteModel->find($id);

        echo view('/contacte/readContactForm', $data);

    }

}