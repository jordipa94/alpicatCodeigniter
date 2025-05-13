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

    // POST PER CREAR CATEGORIES DES DEL CRUD
    public function crearCategoria()
    {

        $model = new CategoriesModel();

        $validationRules = [
            'name' => 'required|max_length[128]',
        ];

        if ($this->validate($validationRules)) {

            $name = $this->request->getPost('name');

            $id = $model->insert([
                "name" => $name,
            ]);

            return redirect()->back()->with('success', 'Categoria creada correctament.');

        } else {
            return redirect()->back()->withInput();
        }
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

    // ELIMINAR USER
    public function deleteCategoria($id)
    {
        $categoriesModel = new CategoriesModel();
        
        $categoria = $categoriesModel->find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'Usuari no trobat.');
        }
        
        $categoriesModel->delete($id);
        
        return redirect()->back()->with('success', 'Categoria eliminada correctament.');
    }

    //VIEW DE LA PAPELERA
    public function recycleBinCategories()
    {
        $categoriesModel = new CategoriesModel();

        $data['categories'] = $categoriesModel->onlyDeleted()->paginate(6, 'default');
        $data['pager'] = $categoriesModel->pager;
        
        return view('config/papeleraCategoria', $data);
    }

    // RESTAURAR USER DE LA PAPELERA
    public function restaurarCategoria($id = null)
    {
        $categoriesModel = new CategoriesModel();

        $user = $categoriesModel->withDeleted()->find($id);

        if ($user['deleted_at'] !== null) {

            $data = [
                'deleted_at' => null,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $categoriesModel->update($id, $data);

            return redirect()->back()->with('success', 'Categoria restaurada correctament.');
        }

        return redirect()->to('/papeleraCategories')->with('error', 'Error al restaurar la categoria.');
    }

}