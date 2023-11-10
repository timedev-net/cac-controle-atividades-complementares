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
        $this->db->query(new RawSql("DROP TABLE logs.auditorias;"));
    }
}
