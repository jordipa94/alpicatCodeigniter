<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CalendarioModel;
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
    //ver User
    public function readUser($id){
        $UsersModel = new \App\Models\UsersModel();
        $user = $UsersModel->find($id);
        
        if (!$user) {
            return redirect()->to(base_url('/administracio_users'));
        }

        return view('Admin_privat/User_read', ['user' => $user]);
    }
    //delete user
    public function deleteUser($id){
        $UsersModel = new \App\Models\UsersModel();
        
        $user = $UsersModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Notícia no trobada.');
        }

        $UsersModel->delete($id);

        return redirect()->to('/administracio_users')->with('Eliminado','Has eliminado correctamente el usuario ');
    }

    public function Registrar(){

        return view('Admin_privat/Registrar');

    }
    //Registrar User
    public function Registrar_post(){

        
        $UsersModel = new \App\Models\UsersModel();
        $data = [
            'User_name' => $this->request->getPost('User_name'),
            'User_email' => $this->request->getPost('User_email'),
            'User_password' => password_hash($this->request->getPost('User_password'), PASSWORD_DEFAULT),
            'VUser_password' => password_hash($this->request->getPost('VUser_password'), PASSWORD_DEFAULT),
        ];
        
       // redirect()->to('/login_dashboard')->with('success','Señor '.$data['User_name'] .' Eres uno del equipo Alpicat , ya puedes hacer Login y Administrar la pagina web.');
        $UsersModel->insert($data);
        return redirect()->to('/admin')->with('success','Señor '.$data['User_name'] .' Eres uno del equipo Alpicat , ya puedes hacer Login y Administrar la pagina web.');
    }


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

    //Calenario 
    public function calendar()
    {

        return view('/Calendario/calendario');
    }

    public function loadEvents()
    {
        $eventModel = new CalendarioModel();
        $events = $eventModel->findAll();
        return $this->response->setJSON($events);
    }

    public function addEvent()
    {
        $eventModel = new CalendarioModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'start' => $this->request->getPost('start'),
            'end'   => $this->request->getPost('end'),
        ];

        $eventModel->insert($data);
        // return de mi pagina de calendario con los datos .
        return $this->response->setJSON(['status' => 'Event Added']);
    }
    public function deleteEvent($id)
    {
        $eventModel = new CalendarioModel();
        $eventModel->delete($id);
        return $this->response->setJSON(['status' => 'Event Deleted']);
}
}