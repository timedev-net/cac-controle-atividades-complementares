<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateAlunos extends Migration
{
    public function up()
    {
        $this->db->query(new RawSql(
            "CREATE TABLE instituicao.alunos (
                id UUID UNIQUE PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                matricula_suap VARCHAR (15) UNIQUE NOT NULL,
                email VARCHAR(100) UNIQUE NOT NULL,
                created_at TIMESTAMP NOT NULL
            );"
        ));
    }

    public function down()
    {
        $this->db->query(new RawSql(
            "DROP TABLE instituicao.alunos;"
        ));
    }
}
