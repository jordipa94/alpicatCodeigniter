<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use DOMDocument;
use DOMXPath;
use App\Models\ClassificationModel;

class ProgramesController extends BaseController
{
    public function index()
    {
        $classificationModel = new ClassificationModel();

        $data['classifications'] = $classificationModel->findAll();
        $data['pager'] = $classificationModel->pager;

        echo view('programes/programes', $data);
    }

    // VIEW PER CREAR CLASSIFICACIONS
    public function viewCrearClassificacio()
    {
        $classificationModel = new ClassificationModel();

        $data['classifications'] = $classificationModel->paginate(6, 'default');
        $data['pager'] = $classificationModel->pager;

        echo view('programes/crearClassificacio',$data);
    }

    // POST PER CREAR CLASSIFICACIONS DES DEL CRUD
    public function crearClassificacio()
    {

        $model = new ClassificationModel();

        $validationRules = [
            'competitionName' => 'required|max_length[128]',
            'contingut' => 'required|max_length[128]',
            'url' => 'required',
            'imatge' => 'permit_empty|is_image[imatge]|max_size[imatge,2048]',
        ];

        if ($this->validate($validationRules)) {

            $competitionName = $this->request->getPost('competitionName');
            $contingut = $this->request->getPost('contingut');
            $url = $this->request->getPost('url');
            $rutaImagen = null;

            // Gestio de la imatge
            $imagen = $this->request->getFile('imatge');
            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                // Crear la carpeta per data si no existeix
                $fecha = date('Y-m-d');
                $rutaCarpeta = 'uploads/classificacions/' . $fecha;
                if (!is_dir($rutaCarpeta)) {
                    mkdir($rutaCarpeta, 0777, true);
                }

                $nombreImagen = $imagen->getRandomName();
                $imagen->move($rutaCarpeta, $nombreImagen);
                $rutaImagen = $rutaCarpeta . '/' . $nombreImagen;
            }

            $id = $model->insert([
                "competitionName" => $competitionName,
                "contingut" => $contingut,
                "url" => $url,
                "imagen_path" => $rutaImagen,
            ]);

            return redirect()->back()->with('success', 'Classificació creada correctament.');

        } else {
            return redirect()->back()->withInput();
        }
    }

    // VIEW PER CREAR CLASSIFICACIONS
    public function viewLlistatClassificacio()
    {
        $classificationModel = new ClassificationModel();

        $data['classifications'] = $classificationModel->paginate(6, 'default');
        $data['pager'] = $classificationModel->pager;

        echo view('programes/llistatClassifications',$data);
    }
    
    //BUSCADOR DE CLASSIFICACIONS
    public function searchClassificacio()
    {
        $keyword = $this->request->getGet('keyword');
        $classificationModel = new ClassificationModel();

        if ($keyword) {
            $classificationModel->groupStart()
                        ->like('competitionName', $keyword)
                        ->groupEnd();
        }

        $data['classifications'] = $classificationModel->paginate(6);
        $data['pager'] = $classificationModel->pager;
        $data['keyword'] = $keyword;

        return view('programes/llistatClassifications', $data);
    }

    // VIEW PER EDITAR LA CLASSIFICACIO
    public function editClassificacio($id)
    {
        $model = new ClassificationModel();
        $classification = $model->find($id);
    
        if (!$classification) {
            return redirect()->to(base_url('editClassificacio/').$id);
        }

        return view('programes/editClassificacio', ['classification' => $classification]);
    }

    // POST PER FER UPDATE DE LA CLASSIFICACIO DESDE EDIT CLASSIFICACIO
    public function updateClassificacio($id)
    {
        $model = new ClassificationModel();

        $validationRules = [
            'competitionName' => 'required|max_length[128]',
            'contingut' => 'required|max_length[128]',
            'url' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('editClassificacio/').$id)->withInput();
        }

        $competitionName = $this->request->getPost('competitionName');
        $contingut = $this->request->getPost('contingut');
        $url = $this->request->getPost('url');

        $data = [
            'competitionName' => $competitionName,
            'contingut' => $contingut,
            'url' => $url,
            'imatge' => 'is_image[imatge]|max_size[imatge,2048]'
        ];

                // Comprovar si sa pujat una nova imatge
        $imatge = $this->request->getFile('imatge');
        if ($imatge && $imatge->isValid() && !$imatge->hasMoved()) {
            // Crear carpeta amb la data
            $folder = 'uploads/classificacions/' . date('Y-m-d');
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            // Guardar la nova imatge
            $imatgeName = $imatge->getRandomName();
            $imatge->move($folder, $imatgeName);
            $rutaImatge = $folder . '/' . $imatgeName;

            // Obtenir la imatge antiga per eliminar-la
            $classification = $model->find($id);
            if (!empty($classification['imagen_path']) && file_exists($classificacio['imagen_path'])) {
                unlink($classification['imagen_path']);
            }

            // Actualitzar la ruta de la imatge
            $data['imagen_path'] = $rutaImatge;
        }

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('/admin/programes/llistatClassificacions'))->with('success', 'Classificació editada correctament.');
        } else {
            return redirect()->to(base_url('editClassificacio/').$id);
        }
    }

    // ELIMINAR CLASSIFICACIO
    public function deleteClassificacio($id)
    {
        $classificationModel = new ClassificationModel();
        
        $classification = $classificationModel->find($id);
        if (!$classification) {
            return redirect()->back()->with('error', 'Classificació no trobada.');
        }
        
        $classificationModel->delete($id);
        
        return redirect()->back()->with('success', 'Classificació eliminada correctament.');
    }

    public function recycleBinClassificacio()
    {
        $classificationModel = new ClassificationModel();
        $data['classifications'] = $classificationModel->onlyDeleted()->paginate(6, 'default');
        $data['pager'] = $classificationModel->pager;
        
        return view('programes/papeleraClassifications', $data);
    }

    // RESTAURAR CLASSIFICACIO DE LA PAPELERA
    public function restaurarClassificacio($id = null)
    {
    $classificationModel = new ClassificationModel();

    $classification = $classificationModel->withDeleted()->find($id);

    if ($classification['deleted_at'] !== null) {

        $data = [
            'deleted_at' => null,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $classificationModel->update($id, $data);

        return redirect()->back()->with('success', 'Classificació restaurada correctament.');
    }

    return redirect()->to('/papeleraClassifications');
    }
    
    public function viewClassification($id)
    {
        
        $classificationModel = new ClassificationModel();
        $competition = $classificationModel->getUrlById($id);

        if (!$competition) {
            return "URL no encontrada en la base de datos.";
        }

        $url = $competition['url'];
        $competitionName = $competition['competitionName'];
        $contingut = $competition['contingut'];

        $clasificacio = $this->obtenerClasificacionDesdeURL($url);

        return view('programes/viewClassification', [
            'clasificacio' => $clasificacio,
            'competitionName' => $competitionName,
            'contingut' => $contingut
        ]);
    }

    private function obtenerClasificacionDesdeURL($url)
    {
        function filterCellsByClass($cells, $classToAvoid) {
            $filteredCells = [];

            foreach ($cells as $cell) {
                $classAttribute = $cell->getAttribute('class');
                if (strpos($classAttribute, $classToAvoid) === false) {
                    $filteredCells[] = $cell;
                }
            }

            return $filteredCells;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $html = curl_exec($ch);
        curl_close($ch);

        $dom = new \DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new \DOMXPath($dom);
        $table = $xpath->query("//table[contains(@class, 'fcftable-e')]")->item(0);

        $clasificacio = [];

        if ($table) {
            foreach ($table->getElementsByTagName('tr') as $index => $row) {
                if ($index === 0 || $index === 1) {
                    continue;
                }

                $cells = $row->getElementsByTagName('td');
                $cells = filterCellsByClass($cells, 'detallada');

                if (count($cells) > 0) {
                    $logoImg = $cells[1]->getElementsByTagName('img')->item(0);
                    $logo = $logoImg ? $logoImg->getAttribute('src') : null;

                    $clasificacio[] = [
                        'posicio' => trim($cells[0]->nodeValue),
                        'logo' => $logo,
                        'equip' => trim($cells[2]->nodeValue),
                        'punts' => trim($cells[3]->nodeValue),
                        'pj' => trim($cells[6]->nodeValue),
                        'pg' => trim($cells[7]->nodeValue),
                        'pe' => trim($cells[8]->nodeValue),
                        'pp' => trim($cells[9]->nodeValue),
                        'gf' => trim($cells[10]->nodeValue),
                        'gc' => trim($cells[11]->nodeValue),
                    ];
                }
            }
        }

        return $clasificacio;
    }

}