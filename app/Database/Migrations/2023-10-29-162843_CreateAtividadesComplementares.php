<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateAtividadesComplementares extends Migration
{
    private $tableName = "atividades_complementares";
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint'     => 5, 'unsigned'       => true, 'auto_increment' => true],
            'nome_atividade' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'aluno_id' => ['type' => 'INT', 'null' => false],
            'tp_atividade_id' => ['type' => 'INT', 'null' => false],
            'ano_letivo' => ['type' => 'INT', 'null' => false],
            'periodo_letivo' => ['type' => 'INT', 'null' => false],
            'data_inicio' => ['type' => 'DATE', 'null' => false],
            'data_conclusao' => ['type' => 'DATE', 'null' => false],
            'carga_horaria' => ['type' => 'INT', 'null' => false],
            'obs_complementares' => ['type' => 'TEXT', 'null' => true],
            'deferida' => ['type' => 'BOOLEAN', 'null' => true],
            'razao_indeferimento' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => true],
            'incluido_em' => ['type' => 'TIMESTAMP', 'default' => new RawSql('CURRENT_TIMESTAMP'),
        ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('aluno_id', 'alunos', 'id');
        $this->forge->addForeignKey('tp_atividade_id', 'tp_atividades', 'id');
        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }
}
