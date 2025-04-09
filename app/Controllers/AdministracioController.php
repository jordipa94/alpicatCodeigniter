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
    //Users data
    public function users_Admin(){
        $UersModel = new \App\Models\UsersModel();
        $data['users']= $UersModel->paginate(6,'default');
        $data['pager'] = $UersModel->pager;
        
        $user = $UersModel->findall();

        echo view('Admin_privat/admin_users',$data);
    
    }
    //delete user
    public function deleteUser($id){
        $UersModel = new \App\Models\UsersModel();
        
        $UersModel->delete($id);

        return redirect()->to('/administracio_users');
    }

    public function Registrar(){

        return view('Admin_privat/Registrar');

    }
    //Registrar User
    public function Registrar_post(){
        
        return view('Admin_privat/Regitrar');

    }
    //Search User 
    public function searchUser()
    {
        $keyword = $this->request->getGet('keyword');
        $UersModel = new \App\Models\UsersModel();
        if ($keyword) {
            $UersModel->groupStart()
                        ->like('User_name', $keyword)
                        ->orLike('User_name', $keyword)
                        ->groupEnd();
        }

        $data['users'] = $UersModel->paginate(6);
        $data['pager'] = $UersModel->pager;
        $data['keyword'] = $keyword;

        return view('Admin_privat/admin_users', $data);
    }


}
