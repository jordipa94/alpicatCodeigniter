<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class classificationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'competitionName' => 'Primer Equip',
                'url' => 'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('classification')->insertBatch($data);
    }
}