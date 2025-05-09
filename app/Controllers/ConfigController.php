<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ConfigModel;

class ConfigController extends BaseController
{
    // VIEW PER CREAR NOTICIES
    public function index()
    {
        $configModel = new ConfigModel();

        $data['configs'] = $configModel->paginate(6, 'default');
        $data['pager'] = $configModel->pager;

        echo view('config/gestionarConfig',$data);
    }

    //BUSCADOR
    public function searchConfig()
    {
        $keyword = $this->request->getGet('keyword');
        $model = new ConfigModel();

        if ($keyword) {
            $model->groupStart()
                        ->like('clau', $keyword)
                        ->orLike('valor', $keyword)
                        ->groupEnd();
        }

        $data['configs'] = $model->paginate(6);
        $data['pager'] = $model->pager;
        $data['keyword'] = $keyword;

        return view('config/gestionarConfig', $data);
    }

    public function editConfig($id)
    {
        $model = new ConfigModel();
        $config = $model->find($id);
    
        if (!$config) {
            return redirect()->to(base_url('admin/editConfig/').$id);
        }

        return view('config/editConfig', ['config' => $config]);
    }

    public function updateConfig($id)
    {
        $model = new ConfigModel();

        $validationRules = [
            'valor' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('admin/editConfig/').$id)->withInput();
        }
        
        $valor = $this->request->getPost('valor');

        $data = [
            'valor' => $valor,
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('/admin/gestionarConfig'))->with('success', 'Configuracio editada correctament.');
        } else {
            return redirect()->to(base_url('admin/editConfig/').$id);
        }
    }

}