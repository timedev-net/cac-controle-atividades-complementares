<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTpAtividades extends Migration
{
    public function up()
    {
        $this->db->query(new RawSql(
            "CREATE TABLE atividades.tp_atividades (
                id VARCHAR(36) UNIQUE PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                curricular BOOLEAN NOT NULL,
                limite_hora INT NOT NULL
            )"
        ));
    }

    public function down()
    {
        $this->db->query(new RawSql("DROP TABLE atividades.tp_atividades;"));
    }
}
