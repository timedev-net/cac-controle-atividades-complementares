<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateAlunos extends Migration
{
    // protected $DBGroup = 'instituicao';
    // private $tableName = "alunos";
    public function up()
    {
        // $this->forge->addField([
        //     'id'             => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
        //     'nome'           => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
        //     'matricula_suap' => ['type' => 'VARCHAR', 'constraint' => '15', 'null' => false],
        //     'email'          => ['type' => 'VARCHAR', 'constraint' => '45', 'null' => false],
        // ]);
        // $this->forge->addPrimaryKey('id');
        // $this->forge->addUniqueKey('matricula_suap', 'matricula_suap_unique');
        // $this->forge->createTable($this->tableName);

        $this->db->query(new RawSql(
            "CREATE TABLE instituicao.alunos (
                id SERIAL PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                matricula_suap VARCHAR (15) UNIQUE NOT NULL,
                email VARCHAR(100) UNIQUE NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            );"
        ));

    }

    public function down()
    {
        // $this->forge->dropTable($this->tableName);
        $this->db->query(new RawSql(
            "DROP TABLE instituicao.alunos;"
        ));
    }
}
