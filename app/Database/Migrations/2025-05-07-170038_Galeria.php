<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeria extends Migration
{
    public function up()
    {
        // GALERIES
        $this->forge->addField([
            'id_galeria' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nom_galeria' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'descripcio_galeria' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'categoria' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id_galeria', true);
        $this->forge->createTable('galerias');

        // IMATGES GALERIES
        $this->forge->addField([
            'id_imagen' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_galeria' => [
                'type'       => 'INT',
            ],
            'imagen_path' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id_imagen', true);
        $this->forge->addForeignKey('id_galeria', 'galerias', 'id_galeria', 'CASCADE', 'CASCADE');
        $this->forge->createTable('imagenes_galeria');
    }

    public function down()
    {
        $this->forge->dropTable('imagenes_galeria');
        $this->forge->dropTable('galerias');
    }
}
