<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Calendario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_evento'      => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'titulo'         => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'descripcion'    => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'fecha_inicio'   => [
                'type' => 'DATETIME',
            ],
            'fecha_fin'      => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'color'          => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'created_at'     => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'     => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'     => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_evento', true);
        $this->forge->createTable('eventos');
    }

    public function down()
    {
        $this->forge->dropTable('eventos');
    }
}
