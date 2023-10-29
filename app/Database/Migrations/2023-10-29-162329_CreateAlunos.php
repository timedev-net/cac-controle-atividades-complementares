<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlunos extends Migration
{
    private $tableName = "alunos";
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'matricula_suap' => ['type' => 'VARCHAR', 'constraint' => '15', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }
}
