<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAtividadesComplementares extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nome_atividade' => 'Curso php',
                'aluno_id'       => 1,
                'tp_atividade_id'   => 1,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Curso Java',
                'aluno_id'       => 1,
                'tp_atividade_id'   => 1,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '1',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '10',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Curso Python',
                'aluno_id'       => 1,
                'tp_atividade_id'   => 1,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '10',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Artigo científico TCC',
                'aluno_id'       => 1,
                'tp_atividade_id'   => 2,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '10',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'semestre regular',
                'aluno_id'       => 1,
                'tp_atividade_id'   => 3,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '300',
                'deferida'      => true
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
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer 5',
                'aluno_id'       => 5,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer 4',
                'aluno_id'       => 5,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => false
            ],
            [
                'nome_atividade' => 'Atividade Academic 6',
                'aluno_id'       => 5,
                'tp_atividade_id'   => 3,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => false
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
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer 1',
                'aluno_id'       => 7,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer 2',
                'aluno_id'       => 7,
                'tp_atividade_id'   => 6,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
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
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade academica 1',
                'aluno_id'       => 10,
                'tp_atividade_id'   => 3,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '30',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Atividade academica 2',
                'aluno_id'       => 10,
                'tp_atividade_id'   => 3,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '30',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Atividade Científica',
                'aluno_id'       => 10,
                'tp_atividade_id'   => 2,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '15',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Curso Banco de Dados',
                'aluno_id'       => 10,
                'tp_atividade_id'   => 1,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '1',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '15',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Curso de Programação Web',
                'aluno_id'       => 10,
                'tp_atividade_id'   => 1,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '15',
                'deferida'      => true
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
                'deferida'      => null
            ],
        ];

        $this->db->table('atividades.atividades_complementares')->insertBatch($data);
    }
}
