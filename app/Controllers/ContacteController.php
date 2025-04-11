<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ContacteModel;

class ContacteController extends BaseController
{
    //VISTA DE CONTACTE
    public function index()
    {
        echo view("contacte/contacte");
    }

    //ENVIAR FORMULARI DE CONTACTE
    public function enviarFormulariContacte()
    {

        $model = new ContacteModel();

        $validationRules = [
            'concepte' => [
                'label' => 'Concepte',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'El camp {field} és obligatori.',
                    'max_length' => 'El {field} no pot tenir més de {param} caràcters.'
                ]
            ],
            'missatge' => [
                'label' => 'Missatge',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp {field} és obligatori.'
                ]
            ],
            'telefono' => [
                'label' => 'Telèfon',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp {field} és obligatori.'
                ]
            ],
            'correu' => [
                'label' => 'Correu electrònic',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El camp {field} és obligatori.',
                    'valid_email' => 'El {field} no és vàlid.'
                ]
            ],
            'categoria' => [
                'label' => 'Categoria',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Selecciona una {field}.'
                ]
            ],
        ];        

        if ($this->validate($validationRules)) {

            $concepte = $this->request->getPost('concepte');
            $missatge = $this->request->getPost('missatge');
            $telefono = $this->request->getPost('telefono');
            $correu = $this->request->getPost('correu');
            $categoria = $this->request->getPost('categoria');

            $model->insert(["concepte" => $concepte, "missatge" => $missatge,
                "telefono" => $telefono, "correu" => $correu,"categoria" => $categoria]);

            return redirect()->back()->with('success', 'Missatge enviat correctament!');

        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
    }

    //VISTA GESTIONAR CONTACTE
    public function gestionarContacte()
    {
    $contacteModel = new ContacteModel();

    $categoria = $this->request->getGet('categoria');

    if (!empty($categoria)) {
        $data['missatges'] = $contacteModel
            ->where('categoria', $categoria)
            ->orderBy('created_at', 'DESC')
            ->paginate(6, 'default');
    } else {
        $data['missatges'] = $contacteModel
            ->orderBy('created_at', 'DESC')
            ->paginate(6, 'default');
    }

    $data['pager'] = $contacteModel->pager;
    $data['categoria'] = $categoria;

    echo view('/contacte/gestioContacte', $data);
    }

    //FILTRAR CONTACTE PER CATEGORIA
    public function filtrar()
    {
        return $this->gestionarContacte();
    }

    //READ CONTACTE
    public function readContactForm($id)
    {
        $contacteModel = new ContacteModel();

        $data['missatge'] = $contacteModel->find($id);

        echo view('/contacte/readContactForm', $data);

    }
}