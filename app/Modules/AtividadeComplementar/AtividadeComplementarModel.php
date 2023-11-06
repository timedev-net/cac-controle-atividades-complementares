<?php

namespace App\Modules\AtividadeComplementar;

use CodeIgniter\Model;

class AtividadeComplementarModel extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->db = db_connect();
    $this->builder = $this->db->table('atividades.atividades_complementares a');
  }

  public function getAll($filters = []): array
  {
    $filters = array_merge(['search' => '', 'page' => 1, 'perPage' => 10], $filters);
    $offset = ($filters['page'] - 1) * $filters['perPage'];
    $s = strtolower($filters['search']);
    $this->builder->select('a.*, al.nome as nome_aluno, ta.nome as nome_tp_atividade, ta.curricular');
    $this->applyFilters($this->builder, $s);
    $this->builder->limit($filters['perPage'], $offset);
    $this->builder->orderBy('a.created_at', 'desc');
    $data = $this->builder->get()->getResult();
    // $data = $this->builder->getCompiledSelect(); dd($data);
    $this->builder->select('count(a.*)');
    $this->applyFilters($this->builder, $s);
    $total = $this->builder->get()->getResult();
    $totalPages = ceil($total[0]->count / $filters['perPage']);
    return [
      'data'       => $data,
      'page'       => $filters['page'],
      'perPage'    => $filters['perPage'],
      'totalItens' => $total[0]->count,
      'totalPages' => $totalPages,
    ];
  }

  private function applyFilters($builder, $search) {

    $builder->join('instituicao.alunos al','al.id = a.aluno_id','left');
    $builder->join('atividades.tp_atividades ta','ta.id = a.tp_atividade_id','left');
    foreach(explode(',',$search) as $s) {
      $s = trim($s);
      $builder->orLike("a.nome_atividade", $s, 'both', true, true);
      $builder->orLike("al.nome", $s, 'both', true, true);
      $builder->orLike("ta.nome", $s, 'both', true, true);
      $builder->orWhere("a.ano_letivo", (int)$s);
      if (str_contains($s, "análise") || str_contains($s, "analise")) $builder->orWhere("a.deferida is null");
      if ($s == "deferida") $builder->orWhere("a.deferida", "t");
      if (str_contains($s, "indeferida")) $builder->orWhere("a.deferida", "f");
    }

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
    // dd($id, $data);
    $this->builder->update($data, ['id' => $id]);
  }

  public function deletar($id)
  {
    return $this->builder->delete(['id' => $id]);
  }
}
