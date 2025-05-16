<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoticiesModel;
use App\Models\CalendarioModel;
use App\Models\ConfigModel;


class IndexController extends BaseController
{
    public function index()
    {

    $noticiesModel = new NoticiesModel();
    $calendarioModel = new CalendarioModel();
    $config = new ConfigModel();

    $data = [
            'linkBannerPrincipal'  => $config->where('clau', 'linkBannerPrincipal')->first()['valor'] ?? '',
        ];

    $data['noticies'] = $noticiesModel->orderBy('created_at', 'DESC')->paginate(3, 'default');
    $data['eventos'] = $calendarioModel->findAll();

    echo view('home', $data);

    }

}