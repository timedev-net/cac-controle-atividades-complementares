<?php

namespace App\LayerExternal\Repositories\InPostgres;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Model;

class RelatorioRepo extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    public function alunosComTodasAtividadesCurricularesOk()
    {
        //-- RELATORIO VERIFICA SE COMPLETOU TODAS AS ATIVIDADES Curriculares CADASTRADAS
        $sql = "select
            a.id as aluno_id,
            a.nome,
            ac.tp_atividade_id,
            tp.nome as nome_atividade,
            sum(ac.carga_horaria) horas_total_by_tp_atividade,
            min(tp.limite_hora) limite_min_horas
            from atividades.atividades_complementares ac
            left join atividades.tp_atividades tp on ac.tp_atividade_id = tp.id
            left join instituicao.alunos a on a.id = ac.aluno_id
            where ac.deferida is true and tp.curricular is true
            group by ac.tp_atividade_id, tp.nome, a.id
            having sum(ac.carga_horaria) >= avg(tp.limite_hora)";

        return $this->db->query(new RawSql($sql))->getResult();
    }
    public function alunoAllDetalhes($id)
    {
        //-- RELATORIO VERIFICA TODOS OS DETALHES DO ALUNO
        $sql = "select a.*,
        jsonb_agg(jsonb_build_object(
            'atividade', ac.nome_atividade,
            'periodo_letivo', concat(ac.ano_letivo,'/',ac.periodo_letivo),
            'tp_atividade', ta.nome,
            'curricular', ta.curricular,
            'data_inicio', ac.data_inicio,
            'data_conclusao', ac.data_conclusao,
            'carga_horaria', ac.carga_horaria,
            'obs_complementares', ac.obs_complementares,
            'deferida', ac.deferida,
            'razao_indeferimento', ac.razao_indeferimento,
            'data_cadastro_atividade', ac.created_at
        )) as atividades
        from instituicao.alunos a
        left join atividades.atividades_complementares ac on ac.aluno_id = a.id
        left join atividades.tp_atividades ta on ta.id = ac.tp_atividade_id
        where a.id = '$id'
        group by a.id ";
        return $this->db->query(new RawSql($sql))->getResult();
    }

}
