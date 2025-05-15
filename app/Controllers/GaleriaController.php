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

    public function viewLlistatGaleria()
    {
        $galeriaModel = new GaleriaModel();
        $data['galeries'] = $galeriaModel->paginate(6, 'default');
        $data['pager'] = $galeriaModel->pager;

        return view('galeria/gestioGaleria',$data);
    }

    public function viewCrearGaleria()
    {   
        $galeriaModel = new GaleriaModel();
        $data['galeries'] = $galeriaModel->paginate(6, 'default');
        $data['pager'] = $galeriaModel->pager;

        return view('galeria/crearGaleria',$data);
    }

    public function crearGaleria()
    {
        $model = new GaleriaModel();

        $validationRules = [
            'nom_galeria'        => 'required|max_length[255]',
            'descripcio_galeria' => 'permit_empty|max_length[1000]',
            'imatge_galeria'     => 'permit_empty|max_length[255]',
        ];
        //$base64_image = $this->request->getPost('imatge_galeria');
        
        //$decoded_image = base64_decode($base64_image);

        //foto ----> URL 
        
        $validationRules = [
            'nom_galeria'        => 'required|max_length[255]',
            'descripcio_galeria' => 'permit_empty|max_length[1000]',
            'imatge_galeria'     => 'uploaded[imatge_galeria]|is_image[imatge_galeria]',
        ];
    
        if ($this->validate($validationRules)) {
            $imagen = $this->request->getFile('imatge_galeria');
    
            if ($imagen->isValid() && !$imagen->hasMoved()) {
                $contenido = file_get_contents($imagen->getTempName());
                $base64 = base64_encode($contenido);
                $mime = $imagen->getMimeType(); // ej. image/jpeg
                $dataUri = 'data:' . $mime . ';base64,' . $base64;
            }
    
            $data = [
                'nom_galeria'        => $this->request->getPost('nom_galeria'),
                'descripcio_galeria' => $this->request->getPost('descripcio_galeria'),
                'imatge_galeria'     => $dataUri ?? null,
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
            return redirect()->to(base_url('/admin/galeria/viewLlistatGaleria'))->with('success', 'Galeria editada correctament.');
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

        return view('galeria/gestioGaleria', $data);
    }
}
