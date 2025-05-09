<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_galeria' => [
                'type'           => 'INT',
                'unsigned'       => true,
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
            'imatge_galeria' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id_galeria', true);
        $this->forge->createTable('galerias');
    }

    public function down()
    {
        $this->forge->dropTable('galerias');
    }
}
