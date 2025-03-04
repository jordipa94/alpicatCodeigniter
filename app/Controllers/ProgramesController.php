<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramesController extends BaseController
{
    public function programes()
    {
        echo view("header");
        echo view("programes");
        echo view("footer");
    }
}