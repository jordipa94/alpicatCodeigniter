<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdministracioController extends BaseController
{
    public function index()
    {
        
        return view('Admin_privat/admin');

    }
    public function login_dashboard(){
        return view('Admin_privat/login_dashboard');
    }
    public function login_dashboard_dark(){
        return view('Admin_privat/login_dash_dark');
    }
    public function login_post(){
    return view('Admin_privat/administracio');
    }
}
