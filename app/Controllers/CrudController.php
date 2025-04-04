<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoticiesModel;

class CrudController extends BaseController
{

    public function viewCrearNoticia()
    {
        $noticiesModel = new NoticiesModel();

        $data['noticies'] = $noticiesModel->paginate(6, 'default');
        $data['pager'] = $noticiesModel->pager;

        echo view('crudNoticies/crearNoticia',$data);
    }
    
    public function crearNoticia()
    {
        //helper(["form"]);
        $model = new NoticiesModel();

        $validationRules = [
            'nom' => 'required|max_length[128]',
            'contingut' => 'required',
        ];

        if ($this->validate($validationRules)) {

            $nom = $this->request->getPost('nom');
            $contingut = $this->request->getPost('contingut');
            $url = url_title($nom);

            $model->insert(["nom" => $nom, "contingut" => $contingut,"url" => $url]);

            return redirect()->to('/crearNoticia');

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

        return view('crudNoticies/readNoticia', ['noticia' => $noticia]);
    }

    // VIEW PER EDITAR LA NOTICIA
    public function editNoticia($id)
    {
        $model = new NoticiesModel();
        $noticia = $model->find($id);
    
        if (!$noticia) {
            return redirect()->to(base_url('editNoticia/').$id);
        }

        return view('crudNoticies/editNoticia', ['noticia' => $noticia]);
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

        $data = [
            'nom' => $this->request->getPost('nom'),
            'contingut' => $this->request->getPost('contingut'),
            'url'=> $this->request->getPost('nom'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('/crearNoticia'));
        } else {
            return redirect()->to(base_url('editNoticia/').$id);
        }
    }

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

        return view('noticies', $data);
    }

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

        return view('crudNoticies/crearNoticia ',['title' => 'News created successfully'], $data);
    }
}