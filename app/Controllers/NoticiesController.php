<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoticiesModel;

class NoticiesController extends BaseController
{
    public function index()
    {
        $noticiesModel = new NoticiesModel();

        $data['noticies'] = $noticiesModel->orderBy('created_at', 'DESC')->paginate(6, 'default');
        $data['pager'] = $noticiesModel->pager;

        echo view('noticies/noticies', $data);
    }

    //BUSCADOR DE NOTICIES
    public function searchNoticia()
    {
        $keyword = $this->request->getGet('keyword');
        $noticiesModel = new NoticiesModel();

        if ($keyword) {
            $noticiesModel->groupStart()
                        ->like('nom', $keyword)
                        ->orLike('contingut', $keyword)
                        ->groupEnd();
        }

        $data['noticies'] = $noticiesModel->paginate(6);
        $data['pager'] = $noticiesModel->pager;
        $data['keyword'] = $keyword;

        return view('noticies/noticies', $data);
    }

    // VIEW PER CREAR NOTICIES
    public function viewCrearNoticia()
    {
        $noticiesModel = new NoticiesModel();

        $data['noticies'] = $noticiesModel->paginate(6, 'default');
        $data['pager'] = $noticiesModel->pager;

        echo view('noticies/crearNoticia',$data);
    }
    
    // POST PER CREAR NOTICIES DES DEL CRUD
    public function crearNoticia()
    {

        $model = new NoticiesModel();

        $validationRules = [
            'nom' => 'required|max_length[128]',
            'contingut' => 'required',
        ];

        if ($this->validate($validationRules)) {

            $nom = $this->request->getPost('nom');
            $contingut = $this->request->getPost('contingut');

            $id = $model->insert([
                "nom" => $nom,
                "contingut" => $contingut,
            ]);
            
            $model->update($id, [
                'url' => base_url('readNoticia/' . $id),
            ]);

            return redirect()->back()->with('success', 'Notícia creada correctament.');

        } else {
            return redirect()->back()->withInput();
        }
    }

    // VIEW PER VEURE LA NOTICIA
    public function readNoticia($id)
    {
        $model = new NoticiesModel();
        $noticia = $model->find($id);
    
        if (!$noticia) {
            return redirect()->to(base_url('/'));
        }

        return view('noticies/readNoticia', ['noticia' => $noticia]);
    }

    // VIEW PER EDITAR LA NOTICIA
    public function editNoticia($id)
    {
        $model = new NoticiesModel();
        $noticia = $model->find($id);
    
        if (!$noticia) {
            return redirect()->to(base_url('editNoticia/').$id);
        }

        return view('noticies/editNoticia', ['noticia' => $noticia]);
    }

    // POST PER FER UPDATE DE LA NOTICIA DESDE EDIT NOTICIA
    public function updateNoticia($id)
    {
        $model = new NoticiesModel();

        $validationRules = [
            'nom' => 'required|max_length[128]',
            'contingut' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('editNoticia/').$id)->withInput();
        }

        $nom = $this->request->getPost('nom');
        $contingut = $this->request->getPost('contingut');

        $url = base_url('readNoticia/' . $id);

        $data = [
            'nom' => $nom,
            'contingut' => $contingut,
            'url' => $url,
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('/crearNoticia'))->with('success', 'Notícia editada correctament.');
        } else {
            return redirect()->to(base_url('editNoticia/').$id);
        }
    }

    // ELIMINAR NOTICIA
    public function deleteNoticia($id)
    {
        $noticiesModel = new NoticiesModel();
        
        $noticia = $noticiesModel->find($id);
        if (!$noticia) {
            return redirect()->back()->with('error', 'Notícia no trobada.');
        }
        
        $noticiesModel->delete($id);
        
        return redirect()->back()->with('success', 'Notícia eliminada correctament.');
    }

    public function recycleBinNoticia()
    {
        $noticiesModel = new NoticiesModel();
        $data['noticies'] = $noticiesModel->onlyDeleted()->paginate(6, 'default');
        $data['pager'] = $noticiesModel->pager;
        
        return view('noticies/papeleraNoticies', $data);
    }

    // RESTAURAR NOTICIA DE LA PAPELERA
    public function restaurarNoticia($id = null)
    {
    $noticiesModel = new NoticiesModel();

    $noticia = $noticiesModel->withDeleted()->find($id);

    if ($noticia['deleted_at'] !== null) {

        $data = [
            'deleted_at' => null,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $noticiesModel->update($id, $data);

        return redirect()->back()->with('success', 'Notícia restaurada correctament.');
    }

    return redirect()->to('/papeleraNoticies');
    }

    // BUSCADOR DE NOTICIES DES DEL CRUD
    public function searchNoticiaCrud()
    {
        $keyword = $this->request->getGet('keyword');
        $noticiesModel = new NoticiesModel();

        if ($keyword) {
            $noticiesModel->groupStart()
                        ->like('nom', $keyword)
                        ->orLike('contingut', $keyword)
                        ->groupEnd();
        }

        $data['noticies'] = $noticiesModel->paginate(5);
        $data['pager'] = $noticiesModel->pager;
        $data['keyword'] = $keyword;

        return view('noticies/crearNoticia', $data);
    }
    
}