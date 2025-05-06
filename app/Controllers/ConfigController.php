<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ConfigModel;

class ConfigController extends BaseController
{
    // VIEW PER CREAR NOTICIES
    public function index()
    {
        $configModel = new ConfigModel();

        $data['configs'] = $configModel->paginate(6, 'default');
        $data['pager'] = $configModel->pager;

        echo view('gestionarConfig',$data);
    }
}
