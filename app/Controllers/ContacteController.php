<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContacteController extends BaseController
{
    public function contacte()
    {
        echo view("header");
        echo view("contacte");
        echo view("footer");
    }
}