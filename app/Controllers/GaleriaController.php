<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriaModel;
use App\Models\CategoriesModel;
use App\Models\imatgesGaleriaModel;

class GaleriaController extends BaseController
{
    
    public function index()
    {
        $model = new GaleriaModel();
        $imagenModel = new imatgesGaleriaModel();
        $categoriaModel = new CategoriesModel();

        $categories = $categoriaModel->findAll();
        $categoriaSeleccionada = $this->request->getGet('categoria') ?? '';

        if (!empty($categoriaSeleccionada)) {
            $galerias = $model->where('categoria', $categoriaSeleccionada)
                            ->orderBy('created_at', 'DESC')
                            ->paginate(9, 'default');
        } else {
            $galerias = $model->orderBy('created_at', 'DESC')
                            ->paginate(9, 'default');
        }

        // Obtener la imagen de portada para cada galería
        foreach ($galerias as &$galeria) {
            $imagenPortada = $imagenModel
                ->where('id_galeria', $galeria['id_galeria'])
                ->orderBy('created_at', 'ASC')
                ->first();
            
            // Si hay imagen de portada, la añadimos
            $galeria['portada'] = $imagenPortada ? base_url($imagenPortada['imagen_path']) : base_url('img/placeholder.jpg');
        }

        $data['galeries'] = $galerias;
        $data['categories'] = $categories;
        $data['categoriaSeleccionada'] = $categoriaSeleccionada;
        $data['pager'] = $model->pager;

        echo view('galeria', $data);
    }

    public function filtrar()
    {

        return redirect()->to('/galeria?categoria=' . $this->request->getGet('categoria'));

    }

    public function filtrarCrud()
    {

        return redirect()->to('/admin/galeria/viewLlistatGaleria?categoria=' . $this->request->getGet('categoria'));

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

        $categoriaModel = new CategoriesModel();
        $categories = $categoriaModel->findAll();

        $data['galeries'] = $galeriaModel->paginate(6, 'default');
        $data['categories'] = $categories;
        $data['pager'] = $galeriaModel->pager;

        return view('galeria/crearGaleria',$data);
    }

    public function crearGaleria()
    {
        $galeriaModel = new GaleriaModel();
        $imagenModel = new imatgesGaleriaModel();

        $validationRules = [
            'nom_galeria'        => 'required|max_length[255]',
            'descripcio_galeria' => 'permit_empty|max_length[1000]',
            'imatge_galeria.*'   => 'uploaded[imatge_galeria]|is_image[imatge_galeria]',
            'categoria'          => 'required',
        ];

        if ($this->validate($validationRules)) {
            $dataGaleria = [
                'nom_galeria'        => $this->request->getPost('nom_galeria'),
                'descripcio_galeria' => $this->request->getPost('descripcio_galeria'),
                'categoria'          => $this->request->getPost('categoria'),
                'created_at'         => date('Y-m-d H:i:s')
            ];

            $galeriaModel->insert($dataGaleria);
            $idGaleria = $galeriaModel->insertID();
            
            $imagenes = $this->request->getFiles('imatge_galeria');
            $imagenesGuardadas = [];

            foreach ($imagenes['imatge_galeria'] as $imagen) {
                if ($imagen->isValid() && !$imagen->hasMoved()) {
                    // Guardar la imatge en la carpeta 'uploads/galeria'
                    $imagen->move('uploads/galeria');
                    $rutaImagen = 'uploads/galeria/' . $imagen->getName();
                    
                    // Guardar la informació de la imatge en la tabla imagenes_galeria
                    $dataImagen = [
                        'id_galeria' => $idGaleria,
                        'imagen_path' => $rutaImagen,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    $imagenModel->insert($dataImagen);
                    $imagenesGuardadas[] = $rutaImagen;
                }
            }

            if (count($imagenesGuardadas) > 0) {
                return redirect()->back()->with('success', 'Galeria creada correctament amb ' . count($imagenesGuardadas) . ' imatges.');
            } else {
                return redirect()->back()->with('error', 'No s\'han pogut guardar les imatges.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Validació fallida.');
        }
    }

    public function readGaleria($id)
    {
        $galeriaModel = new GaleriaModel();
        $imagenModel = new imatgesGaleriaModel();

        $galeria = $galeriaModel->find($id);

        if (!$galeria) {
            return redirect()->to(base_url('/galeria'))->with('error', 'La galeria no existeix.');
        }

        $imagenes = $imagenModel->where('id_galeria', $id)->findAll();

        return view('galeria/readGaleria', [
            'galeria' => $galeria,
            'imagenes' => $imagenes
        ]);
    }

    public function editGaleria($id)
    {
        $model = new GaleriaModel();
        $imagenModel = new imatgesGaleriaModel();
        
        $galeria = $model->find($id);
        $imagenes = $imagenModel->where('id_galeria', $id)->findAll();

        $categoriaModel = new CategoriesModel();
        $categories = $categoriaModel->findAll();

        if (!$galeria) {
            return redirect()->to(base_url('/galeria'));
        }

        $data['galeria'] = $galeria;
        $data['categories'] = $categories;
        $data['imagenes'] = $imagenes;

        return view('galeria/editGaleria', $data);
    }

    public function updateGaleria($id)
    {
        $model = new GaleriaModel();
        $imagenModel = new imatgesGaleriaModel();

        $validationRules = [
            'nom_galeria'        => 'required|max_length[255]',
            'descripcio_galeria' => 'permit_empty|max_length[1000]',
            'categoria'          => 'required',
            'imatge_galeria.*'   => 'permit_empty|is_image[imatge_galeria]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('admin/galeria/editGaleria/' . $id))->withInput();
        }
        
        $data = [
            'nom_galeria'        => $this->request->getPost('nom_galeria'),
            'descripcio_galeria' => $this->request->getPost('descripcio_galeria'),
            'categoria'          => $this->request->getPost('categoria'),
            'updated_at'         => date('Y-m-d H:i:s'),
        ];
        $model->update($id, $data);

        $imagenesEliminar = $this->request->getPost('imagenesEliminar');
        if (!empty($imagenesEliminar)) {
            foreach ($imagenesEliminar as $imagenId) {
                $imagen = $imagenModel->find($imagenId);
                if ($imagen) {
                    // Eliminar del servidor
                    if (file_exists($imagen['imagen_path'])) {
                        unlink($imagen['imagen_path']);
                    }
                    $imagenModel->delete($imagenId);
                }
            }
        }

        if ($imagenes = $this->request->getFiles('imatge_galeria')) {
            foreach ($imagenes['imatge_galeria'] as $imagen) {
                if ($imagen->isValid() && !$imagen->hasMoved()) {
                    $imagen->move('uploads/galeria');
                    $rutaImagen = 'uploads/galeria/' . $imagen->getName();
                    
                    $imagenModel->insert([
                        'id_galeria' => $id,
                        'imagen_path' => $rutaImagen,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }

        return redirect()->to(base_url('/admin/galeria/viewLlistatGaleria'))->with('success', 'Galeria editada correctament.');
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
