<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateAtividadesComplementares extends Migration
{
    // protected $DBGroup = 'atividades';
    // private $tableName = "atividades_complementares";
    public function up()
    {
        // $this->forge->addField([
        //     'id'                  => ['type' => 'INT', 'constraint'     => 5, 'unsigned'       => true, 'auto_increment' => true],
        //     'nome_atividade'      => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
        //     'aluno_id'            => ['type' => 'INT', 'null' => false],
        //     'tp_atividade_id'     => ['type' => 'INT', 'null' => false],
        //     'ano_letivo'          => ['type' => 'INT', 'null' => false],
        //     'periodo_letivo'      => ['type' => 'INT', 'null' => false],
        //     'data_inicio'         => ['type' => 'DATE', 'null' => false],
        //     'data_conclusao'      => ['type' => 'DATE', 'null' => false],
        //     'carga_horaria'       => ['type' => 'INT', 'null' => false],
        //     'obs_complementares'  => ['type' => 'TEXT', 'null' => true],
        //     'deferida'            => ['type' => 'BOOLEAN', 'null' => true],
        //     'razao_indeferimento' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => true],
        //     'incluido_em'         => ['type' => 'TIMESTAMP', 'default' => new RawSql('CURRENT_TIMESTAMP'),
        // ],
        // ]);
        // $this->forge->addPrimaryKey('id');
        // $this->forge->addForeignKey('aluno_id', 'alunos', 'id');
        // $this->forge->addForeignKey('tp_atividade_id', 'tp_atividades', 'id');
        // $this->forge->createTable($this->tableName);
        $this->db->query(new RawSql(
            "CREATE TABLE atividades.atividades_complementares (
                id SERIAL PRIMARY KEY,
                nome_atividade VARCHAR(100) NOT NULL,
                aluno_id INT NOT NULL,
                tp_atividade_id INT NOT NULL,
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
        // $this->forge->dropTable($this->tableName);
        $this->db->query(new RawSql("DROP TABLE atividades.atividades_complementares;"));
    }
}
