<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ContacteModel;
use App\Models\ConfigModel;
use App\Models\CategoriesModel;


class ContacteController extends BaseController
{
    //VISTA DE CONTACTE
    public function index()
    {
        $config = new ConfigModel();

        $categoriaModel = new CategoriesModel();
        $categories = $categoriaModel->findAll();

        $data = [
            'categories' => $categories,
            'telefon' => $config->where('clau', 'telefon')->first()['valor'] ?? '',
            'mail' => $config->where('clau', 'mail')->first()['valor'] ?? '',
            'direction'  => $config->where('clau', 'direccio')->first()['valor'] ?? '',
            'googleMaps'  => $config->where('clau', 'googleMaps')->first()['valor'] ?? '',
        ];

        return view('contacte/contacte', $data);
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
        $categoriaModel = new CategoriesModel();
        
        $categories = $categoriaModel->findAll();
        $categoria = $this->request->getGet('categoria');
        $categoriaSeleccionada = $this->request->getGet('categoria') ?? '';

        // Missatges per contestar (is_active = 0)
        if (!empty($categoria)) {
            $data['missatgesPendents'] = $contacteModel
                ->where('categoria', $categoria)
                ->where('is_active', 0)
                ->orderBy('created_at', 'DESC')
                ->paginate(6, 'default');
            
            $data['missatgesContestats'] = $contacteModel
                ->where('categoria', $categoria)
                ->where('is_active', 1)
                ->orderBy('created_at', 'DESC')
                ->findAll();
        } else {
            $data['missatgesPendents'] = $contacteModel
                ->where('is_active', 0)
                ->orderBy('created_at', 'DESC')
                ->paginate(6, 'default');
            
            $data['missatgesContestats'] = $contacteModel
                ->where('is_active', 1)
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }

        $data['pager'] = $contacteModel->pager;
        $data['categories'] = $categories;
        $data['categoria'] = $categoria;
        $data['categoriaSeleccionada'] = $categoriaSeleccionada;

        echo view('/contacte/gestioContacte', $data);
    }

    public function marcarContestat($id)
    {
        $contacteModel = new ContacteModel();

        $missatge = $contacteModel->find($id);

        if ($missatge) {
            
            $contacteModel->update($id, ['is_active' => 1]);
            return redirect()->to('/admin/gestionarContacte')->with('success', 'Missatge marcat com contestat.');
        }

        return redirect()->to('/admin/gestionarContacte')->with('error', 'El missatge no existeix.');
    }

    public function marcarPendent($id)
    {
        $contacteModel = new ContacteModel();

        $missatge = $contacteModel->find($id);

        if ($missatge) {
            
            $contacteModel->update($id, ['is_active' => 0]);
            return redirect()->to('/admin/gestionarContacte')->with('success', 'Missatge marcat com pendent.');
        }

        return redirect()->to('/admin/gestionarContacte')->with('error', 'El missatge no existeix.');
    }

    //FILTRAR CONTACTE PER CATEGORIA
    public function filtrar()
    {

        return redirect()->to('/admin/gestionarContacte?categoria=' . $this->request->getGet('categoria'));

    }
    
}