<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;
use App\Models\NoticiesModel;
use App\Models\ContacteModel;

class AuthController extends BaseController
{
    public function index()
    {

        $userModel = new UserModel();
        $noticiesModel = new NoticiesModel();
        $contacteModel = new ContacteModel();

        $data = [
            'count_usuaris' => $userModel->countAll(),
            'count_noticies' => $noticiesModel->countAll(),
            'count_contacte' => $contacteModel->countAll(),
        ];
        
        return view('Admin_privat/admin', $data);

    }

    public function showRegisterForm()
    {
        return view('Admin_privat/register');
    }

    public function registerUser()
    {
        helper(['form']);
    
        $rules = [
            'username'         => 'required|is_unique[users.username]',
            'password'         => 'required|min_length[4]',
            'confirm_password' => 'required|matches[password]',
            'full_name'        => 'required',
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->back()
                ->with('error', 'Error al registrar l\'usuari.')
                ->withInput()
                ->with('validation', $this->validator);
        } else {
            $userModel = new UserModel();
    
            $data = [
                'username'     => $this->request->getPost('username'),
                'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'full_name'    => $this->request->getPost('full_name'),
                'role'         => 'visitant',
            ];
    
            $userModel->save($data);
    
            return redirect()->back()->with('success', 'Registre completat! Ara pots iniciar sessio.');
        }
    }
    

    public function showLoginForm()
    {
        return view('Admin_privat/login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Buscar l'usuari per username
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Comprovar password
            if (password_verify($password, $user['password'])) {
                // Guardar info de l'usuari a la sessio
                $sessionData = [
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'role'     => $user['role'],
                    'logged_in'=> true,
                ];
                $session->set($sessionData);

                return redirect()->to('/')->with('success', 'Has iniciat sessio correctament!');
            } else {
                return redirect()->back()->with('error', 'Contrasenya incorrecta.');
            }
        } else {
            return redirect()->back()->with('error', 'Usuari no trobat.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

}