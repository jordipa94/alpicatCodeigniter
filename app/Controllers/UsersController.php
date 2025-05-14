<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UsersController extends BaseController
{
    public function index()
    {

        $usersModel = new UserModel();

        $data['users'] = $usersModel->paginate(6, 'default');
        $data['pager'] = $usersModel->pager;

        return view('users/users', $data);
    }

    // VIEW PER EDITAR L'USUARI
    public function editUser($id)
    {
        $usersModel = new UserModel();
        $user = $usersModel->find($id);

        if (!$user) {
            return redirect()->to(base_url('editUser/' . $id));
        }

        return view('users/editUser', ['user' => $user]);
    }

    // POST PER FER UPDATE DE L'USUARI DES DE EDIT USER
    public function updateUser($id)
    {
        $usersModel = new UserModel();
        
        $validationRules = [
            'username'  => 'required|max_length[128]',
            'full_name' => 'required|max_length[128]',
            'role'      => 'required',
        ];
    
        // Comprovem si vol canviar la contrasenya
        if ($this->request->getPost('password')) {
            $validationRules['password'] = 'min_length[4]';
        }
    
        // Validar
        if (!$this->validate($validationRules)) {
            $errors = $this->validator->getErrors();
    
            // Comprovem si hi ha un error concret de la contrasenya
            if (isset($errors['password'])) {
                return redirect()->to(base_url('admin/users/editUser/' . $id))
                    ->withInput()
                    ->with('error', 'Error amb la contrasenya: ' . $errors['password'])
                    ->with('validation', $this->validator);
            }
    
            // Altres errors (username, full_name, role)
            return redirect()->to(base_url('admin/users/editUser/' . $id))
                ->withInput()
                ->with('error', 'Error al actualitzar l\'usuari.')
                ->with('validation', $this->validator);
        }
    
        // Recollim les dades
        $username = $this->request->getPost('username');
        $full_name = $this->request->getPost('full_name');
        $role = $this->request->getPost('role');
    
        $data = [
            'username'  => $username,
            'full_name' => $full_name,
            'role'      => $role,
        ];
    
        // Nova contrasenya (opcional)
        $password = $this->request->getPost('password');
    
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
    
        // Actualitzem usuari
        if ($usersModel->update($id, $data)) {
            return redirect()->to(base_url('admin/users'))->with('success', 'Usuari editat correctament.');
        } else {
            return redirect()->to(base_url('admin/users/editUser/' . $id))->with('error', 'No s\'ha pogut actualitzar l\'usuari.');
        }
    }

    // ELIMINAR USER
    public function deleteUser($id)
    {
        $userModel = new UserModel();
        
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Usuari no trobat.');
        }
        
        $userModel->delete($id);
        
        return redirect()->back()->with('success', 'Usuari eliminat correctament.');
    }

    //VIEW DE LA PAPELERA
    public function recycleBinUsers()
    {
        $userModel = new UserModel();

        $data['users'] = $userModel->onlyDeleted()->paginate(6, 'default');
        $data['pager'] = $userModel->pager;
        
        return view('users/papeleraUsers', $data);
    }

    // RESTAURAR USER DE LA PAPELERA
    public function restaurarUser($id = null)
    {
        $userModel = new UserModel();

        $user = $userModel->withDeleted()->find($id);

        if ($user['deleted_at'] !== null) {

            $data = [
                'deleted_at' => null,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $userModel->update($id, $data);

            return redirect()->back()->with('success', 'Usuari restaurat correctament.');
        }

        return redirect()->to('/papeleraUsers');
    }

    public function searchUser()
    {
        $keyword = $this->request->getGet('keyword');
        $UserModel = new UserModel();

        if ($keyword) {
            $UserModel->groupStart()
                        ->like('username', $keyword)
                        ->orLike('full_name', $keyword)
                        ->orLike('role', $keyword)
                        ->groupEnd();
        }

        $data['users'] = $UserModel->paginate(6);
        $data['pager'] = $UserModel->pager;
        $data['keyword'] = $keyword;

        return view('users/users', $data);
    }

}