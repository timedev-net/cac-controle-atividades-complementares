<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateAuditoriaLogs extends Migration
{
    // protected $DBGroup = 'logs';
    // private $tableName = 'auditorias';
    public function up()
    {
        // $this->forge->addField([
        //     'data_hora_evento'   => ['type' => 'TIMESTAMP', 'default' => new RawSql('CURRENT_TIMESTAMP')],
        //     'nome_tabela'        => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
        //     'operacao'           => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => false],
        //     'registro_anterior'  => ['type' => 'JSON', 'null' => true],
        //     'registro_posterior' => ['type' => 'JSON', 'null' => true],
        // ]);
        // $this->forge->createTable($this->tableName);
        $this->db->query(new RawSql(
            "CREATE TABLE logs.auditorias (
                id SERIAL PRIMARY KEY,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                nome_tabela VARCHAR(100) NOT NULL,
                operacao VARCHAR(100) NOT NULL,
                registro_anterior JSON NULL,
                registro_posterior JSON NULL
            );"
        ));
    }

    public function down()
    {
        // $this->forge->dropTable($this->tableName);
        $this->db->query(new RawSql("DROP TABLE logs.auditorias;"));
    }
}
