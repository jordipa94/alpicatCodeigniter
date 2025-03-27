<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SobreNosaltresController extends BaseController
{
    public function historia()
    {
        echo view("historia");
    }

    public function club()
    {
        echo view("club");
    }

}