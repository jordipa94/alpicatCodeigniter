<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class eventSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titulo' => 'SORTIDA',
                'descripcion' => 'PROXIMA SORTIDA',
                'fecha_inicio' => date('Y-m-d H:i:s'),
                'fecha_fin' => date('Y-m-d H:i:s'),
                'color' => 'blue',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'titulo' => 'JORNADA 3',
                'descripcion' => 'PROXIMA JORNADA',
                'fecha_inicio' => date('Y-m-d H:i:s'),
                'fecha_fin' => date('Y-m-d H:i:s'),
                'color' => 'red',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'titulo' => 'VACANCES',
                'descripcion' => 'VACANCES AL CLUB',
                'fecha_inicio' => date('Y-m-d H:i:s'),
                'fecha_fin' => date('Y-m-d H:i:s'),
                'color' => 'black',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('eventos')->insertBatch($data);
    }
}