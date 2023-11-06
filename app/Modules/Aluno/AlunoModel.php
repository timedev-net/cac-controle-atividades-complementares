<?php

namespace App\Modules\Aluno;

use CodeIgniter\Model;

class AlunoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
        $this->builder = $this->db->table('instituicao.alunos a');
    }

    public function getAll($filters = []): array
    {
        $filters = array_merge(['search' => '', 'page' => 1, 'perPage' => 10], $filters);
        $offset = ($filters['page'] - 1) * $filters['perPage'];

        $this->builder->select("a.*, jsonb_build_object(
            'carga_horaria', jsonb_agg(ac.carga_horaria),
            'deferida', jsonb_agg(ac.deferida)) as atividades");
        $this->builder->join('atividades.atividades_complementares ac','ac.aluno_id = a.id','left');
        $this->builder->like("a.nome", $filters['search'], 'both', null, true);
        $this->builder->limit($filters['perPage'], $offset);
        $this->builder->orderBy('a.nome', 'asc');
        $this->builder->groupBy('a.id');

        $data = $this->builder->get()->getResult();
        $total = $this->db->query('select count(a.*) from instituicao.alunos a')->getResult();
        $totalPages = ceil(($total[0]->count / $filters['perPage']));
        for ($i=0; $i < count($data); $i++) {
            $atividades = json_decode($data[$i]->atividades);
            $data[$i]->qtd_atvs_total = count($atividades->carga_horaria);
            $data[$i]->qtd_atvs_deferida = count(array_filter($atividades->deferida, fn($e) => $e));
            $data[$i]->qtd_horas_total = array_sum($atividades->carga_horaria);
            unset($data[$i]->atividades);
        }
        return [
            'data' => $data,
            'page' => $filters['page'],
            'perPage' => $filters['perPage'],
            'totalItens' => $total[0]->count,
            'totalPages' => $totalPages,
        ];
    }

    public function getAllToSelectInput() {
        return $this->builder->select('a.id, a.nome')->get()->getResult();
    }

    public function getById($id)
    {
        $this->builder->where('id', $id);
        $data = $this->builder->get()->getRow();
        return $data;
    }

    public function cadastrar($data)
    {
        $this->builder->insert($data);
    }
    public function atualizar($id, $data)
    {
        $this->builder->update($data, ['id' => $id]);
    }

    public function deletar($id) {
        return $this->builder->delete(['id' => $id]);
    }

}
