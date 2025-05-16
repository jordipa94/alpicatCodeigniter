<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'clau' => 'telefon',
                'valor' => '672885280',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clau' => 'mail',
                'valor' => 'alpicat@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clau' => 'direccio',
                'valor' => 'Camí del Graó, 25110, 25110 Alpicat, Lleida',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clau' => 'googleMaps',
                'valor' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2980.369568038748!2d0.5509227!3d41.669361300000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a71eaf593a5081%3A0x85412f105933abd3!2sCamp%20Municipal%20de%20Alpicat%20-%20Club%20Atl%C3%A8tic%20d%E2%80%99Alpicat!5e0!3m2!1ses!2ses!4v1737622619947!5m2!1ses!2ses',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clau' => 'facebookLink',
                'valor' => 'https://www.facebook.com/UnioEsportivaAlpicat/?locale=es_ES',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clau' => 'twitterLink',
                'valor' => 'https://x.com/FutbolAlpicat?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clau' => 'instagramLink',
                'valor' => 'https://www.instagram.com/futbolalpicat/?hl=es',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clau' => 'linkBannerPrincipal',
                'valor' => 'https://www.fcf.cat/equip/2324/2cat/alpicat-at-c-a',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('config')->insertBatch($data);
    }
}