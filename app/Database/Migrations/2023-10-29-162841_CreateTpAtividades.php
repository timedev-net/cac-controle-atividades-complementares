<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTpAtividades extends Migration
{
    private $tableName = "tp_atividades";
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'curricular' => ['type' => 'BOOLEAN', 'null' => false],
            'limite_hora' => ['type' => 'INT', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }
}
