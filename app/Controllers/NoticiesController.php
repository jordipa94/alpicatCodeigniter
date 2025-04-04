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

        echo view('noticies', $data);
    }

    
}