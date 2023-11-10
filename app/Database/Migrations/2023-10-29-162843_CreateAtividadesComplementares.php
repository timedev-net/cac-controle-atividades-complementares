<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateAtividadesComplementares extends Migration
{
    public function up()
    {
        $this->db->query(new RawSql(
            "CREATE TABLE atividades.atividades_complementares (
                id VARCHAR(36) UNIQUE PRIMARY KEY,
                nome_atividade VARCHAR(100) NOT NULL,
                aluno_id VARCHAR(36) NOT NULL,
                tp_atividade_id VARCHAR(36) NOT NULL,
                ano_letivo INT NOT NULL,
                periodo_letivo INT NOT NULL,
                data_inicio DATE NOT NULL,
                data_conclusao DATE NOT NULL,
                carga_horaria INT NOT NULL,
                obs_complementares TEXT NULL,
                deferida BOOLEAN NULL,
                razao_indeferimento VARCHAR(200) NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (aluno_id) REFERENCES instituicao.alunos (id),
                FOREIGN KEY (tp_atividade_id) REFERENCES atividades.tp_atividades (id)
            );"
        ));
    }

    public function down()
    {
        $this->db->query(new RawSql("DROP TABLE atividades.atividades_complementares;"));
    }
}
