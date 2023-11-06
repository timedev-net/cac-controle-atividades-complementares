<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateSchemas extends Migration
{
    public function up()
    {
        $this->db->query(new RawSql("CREATE SCHEMA instituicao;"));
        $this->db->query(new RawSql("CREATE SCHEMA atividades;"));
        $this->db->query(new RawSql("CREATE SCHEMA configuracoes;"));
        $this->db->query(new RawSql("CREATE SCHEMA logs;"));
    }

    public function down()
    {
        $this->db->query(new RawSql("DROP SCHEMA instituicao;"));
        $this->db->query(new RawSql("DROP SCHEMA atividades;"));
        $this->db->query(new RawSql("DROP SCHEMA configuracoes;"));
        $this->db->query(new RawSql("DROP SCHEMA logs;"));
    }
}
