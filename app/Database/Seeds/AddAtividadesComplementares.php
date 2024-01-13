<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddAtividadesComplementares extends Seeder
{
    public function run()
    {
        $aluno_id = $this->db->query('select id from instituicao.alunos')->getResult();
        $tp_atividade_id = $this->db->query('select id from atividades.tp_atividades')->getResult();
        $data = [
            [
                'nome_atividade' => 'Curso php',
                'aluno_id'       => $aluno_id[1-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[1-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Curso Java',
                'aluno_id'       => $aluno_id[1-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[1-1]->id,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '1',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '10',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Curso Python',
                'aluno_id'       => $aluno_id[1-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[1-1]->id,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '10',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Artigo científico TCC',
                'aluno_id'       => $aluno_id[1-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[2-1]->id,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '10',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'semestre regular',
                'aluno_id'       => $aluno_id[1-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[3-1]->id,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '300',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => $aluno_id[3-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[5-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer 5',
                'aluno_id'       => $aluno_id[5-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[6-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer 4',
                'aluno_id'       => $aluno_id[5-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[6-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => false
            ],
            [
                'nome_atividade' => 'Atividade Academic 6',
                'aluno_id'       => $aluno_id[5-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[3-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => false
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => $aluno_id[6-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[6-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer 1',
                'aluno_id'       => $aluno_id[7-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[6-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer 2',
                'aluno_id'       => $aluno_id[7-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[6-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => $aluno_id[11-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[6-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
            [
                'nome_atividade' => 'Atividade academica 1',
                'aluno_id'       => $aluno_id[10-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[3-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '30',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Atividade academica 2',
                'aluno_id'       => $aluno_id[10-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[3-1]->id,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '30',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Atividade Científica',
                'aluno_id'       => $aluno_id[10-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[2-1]->id,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '2',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '15',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Curso Banco de Dados',
                'aluno_id'       => $aluno_id[10-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[1-1]->id,
                'ano_letivo'     => '2023',
                'periodo_letivo' => '1',
                'data_inicio'    => '2023-10-10',
                'data_conclusao' => '2023-10-22',
                'carga_horaria'  => '15',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Curso de Programação Web',
                'aluno_id'       => $aluno_id[10-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[1-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '15',
                'deferida'      => true
            ],
            [
                'nome_atividade' => 'Atividade Qualquer',
                'aluno_id'       => $aluno_id[12-1]->id,
                'tp_atividade_id'   => $tp_atividade_id[9-1]->id,
                'ano_letivo'     => '2022',
                'periodo_letivo' => '2',
                'data_inicio'    => '2022-10-10',
                'data_conclusao' => '2022-10-22',
                'carga_horaria'  => '10',
                'deferida'      => null
            ],
        ];

        date_default_timezone_set("America/Porto_Velho");
        $newdata = array_map(function($e) {
            $uuid = Uuid::uuid4();
            $e['id'] = $uuid->toString();
            $e['created_at'] = date("Y-m-d H:i:s");
            return $e;
        }, $data);

        // dd($newdata);
        $this->db->table('atividades.atividades_complementares')->insertBatch($newdata);
    }
}
