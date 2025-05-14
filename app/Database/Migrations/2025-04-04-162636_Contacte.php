<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contacte extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id'          => [
                        'type'           => 'INT',
                        'auto_increment' => true,
                ],
                'concepte'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                ],
                'missatge'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                ],
                'telefono'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                ],
                'correu'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                ],
                'categoria'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                ],
                'is_active'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                        'default'        => '0',
                ],
                'created_at'      =>  [
                          'type'         =>  'DATETIME',
                           'null'         =>  true,
                           'default'    =>  null,
                ],
                'updated_at'     =>  [
                          'type'         =>  'DATETIME',
                           'null'         =>  true,
                           'default'    =>  null,
                ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contacte');
    }

    public function down()
    {
            $this->forge->dropTable('contacte');
    }
}