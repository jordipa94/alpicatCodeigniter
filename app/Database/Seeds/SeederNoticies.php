<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederNoticies extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom' => 'noticia1',
                'contingut' => 'contingutnoticia1',
                'url' => 'urlnoticia1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom' => 'noticia2',
                'contingut' => 'contingutnoticia2',
                'url' => 'urlnoticia2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nom' => 'noticia3',
                'contingut' => 'contingutnoticia3',
                'url' => 'urlnoticia3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('noticies')->insertBatch($data);
    }
}