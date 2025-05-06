<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UsersModel;
use App\Models\NoticiesModel;

class AuthController extends BaseController
{
    public function index()
    {

        $usersModel = new UsersModel();
        $noticiesModel = new NoticiesModel();

        $data = [
            'count_usuaris' => $usersModel->countAll(),
            'count_noticies' => $noticiesModel->countAll(),
        ];
        
        return view('Admin_privat/admin', $data);

    }

}