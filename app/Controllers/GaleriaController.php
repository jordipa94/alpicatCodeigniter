<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriaModel;

class GaleriaController extends BaseController
{
    
    public function index()
    {
        $galeriaModel = new GaleriaModel();

        $data['galeries'] = $galeriaModel->orderBy('created_at', 'DESC')->paginate(6, 'default');
        $data['pager'] = $galeriaModel->pager;

        return view('galeria', $data);
    }

    public function searchGaleria()
    {
        $keyword = $this->request->getGet('keyword');
        $galeriaModel = new GaleriaModel();

        if ($keyword) {
            $galeriaModel->groupStart()
                         ->like('nom_galeria', $keyword)
                         ->orLike('descripcio_galeria', $keyword)
                         ->groupEnd();
        }

        $data['galeries'] = $galeriaModel->paginate(6);
        $data['pager'] = $galeriaModel->pager;
        $data['keyword'] = $keyword;

        return view('galeria/index', $data);
    }

    public function viewCrearGaleria()
    {
        return view('galeria/crearGaleria');
    }

    public function crearGaleria()
    {
        $model = new GaleriaModel();

        $validationRules = [
            'nom_galeria'        => 'required|max_length[255]',
            'descripcio_galeria' => 'permit_empty|max_length[1000]',
            'imatge_galeria'     => 'permit_empty|max_length[255]',
        ];

        if ($this->validate($validationRules)) {
            $data = [
                'nom_galeria'        => $this->request->getPost('nom_galeria'),
                'descripcio_galeria' => $this->request->getPost('descripcio_galeria'),
                'imatge_galeria'     => $this->request->getPost('imatge_galeria'),
                'created_at'         => date('Y-m-d H:i:s'),
            ];

            $model->insert($data);

            return redirect()->back()->with('success', 'Galeria creada correctament.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Validació fallida.');
        }
    }

    public function readGaleria($id)
    {
        $model = new GaleriaModel();
        $galeria = $model->find($id);

        if (!$galeria) {
            return redirect()->to(base_url('/'));
        }

        return view('galeria/readGaleria', ['galeria' => $galeria]);
    }

    public function editGaleria($id)
    {
        $model = new GaleriaModel();
        $galeria = $model->find($id);

        if (!$galeria) {
            return redirect()->to(base_url('/galeria'));
        }

        return view('galeria/editGaleria', ['galeria' => $galeria]);
    }

    public function updateGaleria($id)
    {
        $model = new GaleriaModel();

        $validationRules = [
            'nom_galeria'        => 'required|max_length[255]',
            'descripcio_galeria' => 'permit_empty|max_length[1000]',
            'imatge_galeria'     => 'permit_empty|max_length[255]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('editGaleria/' . $id))->withInput();
        }

        $data = [
            'nom_galeria'        => $this->request->getPost('nom_galeria'),
            'descripcio_galeria' => $this->request->getPost('descripcio_galeria'),
            'imatge_galeria'     => $this->request->getPost('imatge_galeria'),
            'updated_at'         => date('Y-m-d H:i:s'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('/galeria'))->with('success', 'Galeria editada correctament.');
        } else {
            return redirect()->to(base_url('editGaleria/' . $id));
        }
    }

    public function deleteGaleria($id)
    {
        $model = new GaleriaModel();
        $galeria = $model->find($id);

        if (!$galeria) {
            return redirect()->back()->with('error', 'Galeria no trobada.');
        }

        $model->delete($id);

        return redirect()->back()->with('success', 'Galeria eliminada correctament.');
    }

    public function recycleBinGaleria()
    {
        $model = new GaleriaModel();
        $data['galeries'] = $model->onlyDeleted()->paginate(6, 'default');
        $data['pager'] = $model->pager;

        return view('galeria/papeleraGaleria', $data);
    }

    public function restaurarGaleria($id = null)
    {
        $model = new GaleriaModel();
        $galeria = $model->withDeleted()->find($id);

        if ($galeria && $galeria['deleted_at'] !== null) {
            $data = [
                'deleted_at' => null,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $model->update($id, $data);

            return redirect()->back()->with('success', 'Galeria restaurada correctament.');
        }

        return redirect()->to('/papeleraGaleria');
    }

    public function searchGaleriaCrud()
    {
        $keyword = $this->request->getGet('keyword');
        $model = new GaleriaModel();

        if ($keyword) {
            $model->groupStart()
                  ->like('nom_galeria', $keyword)
                  ->orLike('descripcio_galeria', $keyword)
                  ->groupEnd();
        }

        $data['galeries'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['keyword'] = $keyword;

        return view('galeria/crearGaleria', $data);
    }
}
