<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Config extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id'          => [
                        'type'           => 'INT',
                        'auto_increment' => true,
                ],
                'clau'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                ],
                'valor'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '500',
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
        $this->forge->createTable('config');
    }

    public function down()
    {
            $this->forge->dropTable('config');
    }
}