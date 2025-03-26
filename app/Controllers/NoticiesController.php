<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NoticiesController extends BaseController
{
    public function noticies()
    {
        echo view("noticies");
    }
}