<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'concepte' => 'Consulta general',
                'missatge' => 'Necessito informació sobre els serveis.',
                'telefono' => '123456789',
                'correu' => 'consulta@example.com',
                'categoria' => 'JUVENIL',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'concepte' => 'Problema tècnic',
                'missatge' => 'Tinc un problema amb la plataforma.',
                'telefono' => '987654321',
                'correu' => 'suport@example.com',
                'categoria' => 'VETERANS',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'concepte' => 'Suggeriment',
                'missatge' => 'M\'agradaria suggerir una nova funcionalitat.',
                'telefono' => '1122334455',
                'correu' => 'suggeriments@example.com',
                'categoria' => 'INFANTIL',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Inserim les dades
        $this->db->table('contacte')->insertBatch($data);
    }
}
