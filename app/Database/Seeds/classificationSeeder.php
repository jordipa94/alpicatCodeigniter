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
                'contingut' => 'Descripcio Primer Equip',
                'url' => 'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'competitionName' => 'Juvenil A',
                'contingut' => 'Descripcio Juvenil A',
                'url' => 'https://www.fcf.cat/classificacio/2425/primera-divisio-femeni-alevi/juvenil-segona-divisio/grup-46',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'competitionName' => 'Cadete A',
                'contingut' => 'Descripcio Cadete A',
                'url' => 'https://www.fcf.cat/classificacio/2425/futbol-11/cadet-primera-divisio/grup-14',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'competitionName' => 'Cadete B',
                'contingut' => 'Descripcio Cadete B',
                'url' => 'https://www.fcf.cat/classificacio/2425/juvenil-primera-divisio/cadet-segona-divisio/grup-55',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'competitionName' => 'Infantil A',
                'contingut' => 'Descripcio Infantil A',
                'url' => 'https://www.fcf.cat/classificacio/2425/futbol-11/infantil-segona-divisio-s14/grup-28',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'competitionName' => 'Infantil B',
                'contingut' => 'Descripcio Infantil B',
                'url' => 'https://www.fcf.cat/classificacio/2324/futbol-11/infantil-segona-divisio/grup-2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('classification')->insertBatch($data);
    }
}