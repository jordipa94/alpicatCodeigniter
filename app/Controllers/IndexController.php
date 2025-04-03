<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NoticiesModel;

class IndexController extends BaseController
{
    public function index()
{
    $noticiesModel = new NoticiesModel();

    $data['noticies'] = $noticiesModel->orderBy('created_at', 'DESC')->paginate(3, 'default');

    echo view('home', $data);
}

}
