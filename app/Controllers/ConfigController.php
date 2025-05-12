<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ConfigModel;
use App\Models\CategoriesModel;

class ConfigController extends BaseController
{
    // VIEW CRUD CONFIGURACIO
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

    // VIEW CRUD CATEGORIES
    public function gestionarCategoria()
    {
        $CategoriesModel = new CategoriesModel();

        $data['categories'] = $CategoriesModel->paginate(6, 'default');
        $data['pager'] = $CategoriesModel->pager;

        echo view('config/gestionarCategoria',$data);
    }

    //BUSCADOR
    public function searchCategoria()
    {
        $keyword = $this->request->getGet('keyword');
        $model = new CategoriesModel();

        if ($keyword) {
            $model->groupStart()
                        ->like('name', $keyword)
                        ->groupEnd();
        }

        $data['categories'] = $model->paginate(6);
        $data['pager'] = $model->pager;
        $data['keyword'] = $keyword;

        return view('config/gestionarCategoria', $data);
    }

    public function editCategoria($id)
    {
        $model = new CategoriesModel();
        $categoria = $model->find($id);
    
        if (!$categoria) {
            return redirect()->to(base_url('admin/editCategoria/').$id);
        }

        return view('config/editCategoria', ['categoria' => $categoria]);
    }

    public function updateCategoria($id)
    {
        $model = new CategoriesModel();

        $validationRules = [
            'name' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('admin/editCategoria/').$id)->withInput();
        }
        
        $name = $this->request->getPost('name');

        $data = [
            'name' => $name,
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('/admin/gestionarCategoria'))->with('success', 'Categoria editada correctament.');
        } else {
            return redirect()->to(base_url('admin/editCategoria/').$id)->with('error', 'Error al editar la categoria.');
        }
    }

}