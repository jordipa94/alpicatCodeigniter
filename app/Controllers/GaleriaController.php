<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GaleriaController extends BaseController
{
    public function galeria()
    {
        echo view("header");
        echo view("galeria");
        echo view("footer");
    }
}
