<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {

        $this->db->table('users')->insert([
            'username'     => 'admin',
            'password'     => password_hash('1234', PASSWORD_DEFAULT),
            'full_name'    => 'admin',
            'role'         => 'admin',
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);

        $this->db->table('users')->insert([
            'username'     => 'administrador',
            'password'     => password_hash('1234', PASSWORD_DEFAULT),
            'full_name'    => 'administrador',
            'role'         => 'administrador',
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);
    }
    
}