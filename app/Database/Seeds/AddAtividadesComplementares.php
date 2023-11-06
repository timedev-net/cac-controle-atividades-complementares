<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAtividadesComplementares extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 2,
                'tp_atividade_id'   => 4,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 3,
                'tp_atividade_id'   => 5,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 5,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 6,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 8,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 7,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 11,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 10,
                'tp_atividade_id'   => 5,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => 12,
                'tp_atividade_id'   => 9,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
            ],
        ];

        $this->db->table('atividades.atividades_complementares')->insertBatch($data);
    }
}
