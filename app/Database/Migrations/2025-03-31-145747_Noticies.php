<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Noticies extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id'          => [
                    'type'           => 'INT',
                    'auto_increment' => true,
                ],
                'nom'          => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                ],
                'contingut'          => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                ],
                'url'          => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                ],
                'categoria'          => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                ],
                'imagen_path'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                    'null'           => true,
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
                ],
                'deleted_at'     =>  [
                    'type'         =>  'DATETIME',
                    'null'         =>  true,
                    'default'    =>  null,
                ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('noticies');
    }
    
    public function down()
    {
        $this->forge->dropTable('noticies');
    }
}