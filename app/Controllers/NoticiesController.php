<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoticiesModel;
use App\Models\CategoriesModel;

class NoticiesController extends BaseController
{
    public function index()
    {
        $noticiesModel = new NoticiesModel();
        $categoriaModel = new CategoriesModel();

        $categories = $categoriaModel->findAll();
        $categoriaSeleccionada = $this->request->getGet('categoria') ?? '';

        if (!empty($categoriaSeleccionada)) {
            $data['noticies'] = $noticiesModel
                ->where('categoria', $categoriaSeleccionada)
                ->orderBy('created_at', 'DESC')
                ->paginate(9, 'default');
        } else {
            $data['noticies'] = $noticiesModel->orderBy('created_at', 'DESC')->paginate(9, 'default');
        }

        $data['categories'] = $categories;
        $data['categoriaSeleccionada'] = $categoriaSeleccionada;
        $data['pager'] = $noticiesModel->pager;

        echo view('noticies/noticies', $data);
    }


    public function filtrar()
    {

        return redirect()->to('/noticies?categoria=' . $this->request->getGet('categoria'));

    }

    // VIEW PER CREAR NOTICIES
    public function viewLlistatNoticies()
    {
        $noticiesModel = new NoticiesModel();

        $data['noticies'] = $noticiesModel->paginate(6, 'default');
        $data['pager'] = $noticiesModel->pager;

        echo view('noticies/llistatNoticies',$data);
    }

    //BUSCADOR DE NOTICIES
    public function searchNoticia()
    {
        $keyword = $this->request->getGet('keyword');
        $noticiesModel = new NoticiesModel();
        $categoriaModel = new CategoriesModel();
        $categoriaSeleccionada = $this->request->getGet('categoria') ?? '';
        $categories = $categoriaModel->findAll();

        if ($keyword) {
            $noticiesModel->groupStart()
                ->like('nom', $keyword)
                ->orLike('contingut', $keyword)
                ->groupEnd();
        }

        $data['noticies'] = $noticiesModel->paginate(6);
        $data['categories'] = $categories;
        $data['categoriaSeleccionada'] = $categoriaSeleccionada;
        $data['pager'] = $noticiesModel->pager;
        $data['keyword'] = $keyword;

        return view('noticies/noticies', $data);
    }

    // VIEW PER CREAR NOTICIES
    public function viewCrearNoticia()
    {
        $noticiesModel = new NoticiesModel();

        $categoriaModel = new CategoriesModel();
        $categories = $categoriaModel->findAll();

        $data['noticies'] = $noticiesModel->paginate(6, 'default');
        $data['categories'] = $categories;
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
            'categoria' => 'required',
            'imatge' => 'permit_empty|is_image[imatge]|max_size[imatge,2048]'
        ];

        if ($this->validate($validationRules)) {
            $nom = $this->request->getPost('nom');
            $contingut = $this->request->getPost('contingut');
            $categoria = $this->request->getPost('categoria');
            $rutaImagen = null;

            // Gestio de la imatge
            $imagen = $this->request->getFile('imatge');
            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                // Crear la carpeta per data si no existeix
                $fecha = date('Y-m-d');
                $rutaCarpeta = 'uploads/noticies/' . $fecha;
                if (!is_dir($rutaCarpeta)) {
                    mkdir($rutaCarpeta, 0777, true);
                }

                $nombreImagen = $imagen->getRandomName();
                $imagen->move($rutaCarpeta, $nombreImagen);
                $rutaImagen = $rutaCarpeta . '/' . $nombreImagen;
            }

            $id = $model->insert([
                "nom" => $nom,
                "contingut" => $contingut,
                "categoria" => $categoria,
                "imagen_path" => $rutaImagen,
            ]);
            
            $model->update($id, [
                'url' => base_url('noticies/readNoticia/' . $id),
            ]);

            return redirect()->back()->with('success', 'Notícia creada correctament.');

        } else {
            return redirect()->back()->withInput()->with('error', 'Error al crear la noticia.');
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

        $categoriaModel = new CategoriesModel();
        $categories = $categoriaModel->findAll();

        $data['noticia'] = $noticia;
        $data['categories'] = $categories;
    
        if (!$noticia) {
            return redirect()->to(base_url('editNoticia/').$id);
        }

        return view('noticies/editNoticia', $data);
    }

    // POST PER FER UPDATE DE LA NOTICIA DESDE EDIT NOTICIA
    public function updateNoticia($id)
    {
        $model = new NoticiesModel();
        
        $validationRules = [
            'nom' => 'required|max_length[128]',
            'contingut' => 'required',
            'categoria' => 'required',
            'imatge' => 'is_image[imatge]|max_size[imatge,2048]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('admin/noticies/editNoticia/'.$id))->withInput()->with('error', 'Validació fallida.');
        }

        $nom = $this->request->getPost('nom');
        $contingut = $this->request->getPost('contingut');
        $categoria = $this->request->getPost('categoria');

        $url = base_url('noticies/readNoticia/' . $id);

        $data = [
            'nom' => $nom,
            'contingut' => $contingut,
            'categoria' => $categoria,
            'url' => $url,
        ];

        // Comprovar si sa pujat una nova imatge
        $imatge = $this->request->getFile('imatge');
        if ($imatge && $imatge->isValid() && !$imatge->hasMoved()) {
            // Crear carpeta amb la data
            $folder = 'uploads/noticies/' . date('Y-m-d');
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            // Guardar la nova imatge
            $imatgeName = $imatge->getRandomName();
            $imatge->move($folder, $imatgeName);
            $rutaImatge = $folder . '/' . $imatgeName;

            // Obtenir la imatge antiga per eliminar-la
            $noticia = $model->find($id);
            if (!empty($noticia['imagen_path']) && file_exists($noticia['imagen_path'])) {
                unlink($noticia['imagen_path']);
            }

            // Actualitzar la ruta de la imatge
            $data['imagen_path'] = $rutaImatge;
        }

        // Actualitzar les dades de la notícia
        $model->update($id, $data);
        
        return redirect()->to(base_url('/admin/noticies/llistatNoticies'))->with('success', 'Notícia editada correctament.');
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

        return view('noticies/llistatNoticies', $data);
    }
    
}