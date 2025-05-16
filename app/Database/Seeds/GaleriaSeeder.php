<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class GaleriaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nom_galeria'        => $faker->words(3, true),
                'descripcio_galeria' => $faker->paragraph(2),
                'imatge_galeria'     => $faker->imageUrl(640, 480, 'nature', true, 'Galeria'),
                'categoria' => 'JUVENIL',
                'created_at'         => $faker->dateTime()->format('Y-m-d H:i:s'),
                'updated_at'         => $faker->dateTime()->format('Y-m-d H:i:s'),
                'deleted_at'         => null, 
            ];

            $this->db->table('galerias')->insert($data);
        }
    }
}
