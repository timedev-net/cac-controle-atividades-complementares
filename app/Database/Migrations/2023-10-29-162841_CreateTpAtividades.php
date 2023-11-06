<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTpAtividades extends Migration
{
    // protected $DBGroup = 'atividades';
    // private $tableName = "tp_atividades";
    public function up()
    {
        // $this->forge->addField([
        //     'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
        //     'nome' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
        //     'curricular' => ['type' => 'BOOLEAN', 'null' => false],
        //     'limite_hora' => ['type' => 'INT', 'null' => false],
        // ]);
        // $this->forge->addPrimaryKey('id');
        // $this->forge->createTable($this->tableName);
        $this->db->query(new RawSql(
            "CREATE TABLE atividades.tp_atividades (id SERIAL PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                curricular BOOLEAN NOT NULL,
                limite_hora INT NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);"
        ));
    }

    public function down()
    {
        // $this->forge->dropTable($this->tableName);
        $this->db->query(new RawSql("DROP TABLE atividades.tp_atividades;"));
    }
}
