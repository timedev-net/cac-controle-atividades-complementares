<?php

namespace App\LayerExternal\Repositories\InPostgres;

use App\LayerDomain\Entities\AtividadeComplementar;
use App\LayerDomain\Interfaces\IRepository;
use App\LayerDomain\Interfaces\IRepositoryRemove;
// use CodeIgniter\Model;
use Exception;

class AtividadesComplementaresRepo implements IRepository, IRepositoryRemove {

  protected $db;
  protected $builder;
  public function __construct() {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('atividades.atividades_complementares a');
  }

  public function getAll(array $filters = []): array {
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
  public function getById(string $id): AtividadeComplementar
  {
    $this->builder->where('id', $id);
    $data = (array)$this->builder->get()->getRow();
    return new AtividadeComplementar($data);
  }
  public function create(object $data): void
  {
    if (!$this->builder->insert($data->getAllProps())) {
      $error = $this->db->error();
      throw new Exception($error['message'], $error['code']);
    }
  }
  public function update(object $data): void
  {
    if (!$this->builder->update($data->getAllProps(), ['id' => $data->getId()])) {
      $error = $this->db->error();
      throw new Exception($error['message'], $error['code']);
    }
  }
  public function remove(string $id): void
  {
    if (!$this->builder->delete(['id' => $id])) {
      $error = $this->db->error();
      throw new Exception($error['message'], $error['code']);
    }
  }
  public function getIdAndNameOfAllToSelectInput(): array
  {
    return $this->builder->select('a.id, a.nome_atividade')->get()->getResult();
  }
}
