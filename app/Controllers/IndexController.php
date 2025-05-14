<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoticiesModel;
use App\Models\CalendarioModel;
class IndexController extends BaseController
{
    public function index()
    {

    $noticiesModel = new NoticiesModel();
 $model = new CalendarioModel();
     $data['eventos'] = $model->orderBy('fecha_inicio', 'DESC')->findAll();
    $data['noticies'] = $noticiesModel->orderBy('created_at', 'DESC')->paginate(2,'default');

    echo view('home', $data);

    }

}