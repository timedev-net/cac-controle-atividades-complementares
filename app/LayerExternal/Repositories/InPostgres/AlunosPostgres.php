<?php

namespace App\LayerExternal\Repositories\InPostgres;

use App\LayerDomain\Entities\Aluno;
use App\LayerDomain\Interfaces\IRepository;
use App\LayerDomain\Interfaces\IRepositoryRemove;
// use CodeIgniter\Model;
use Exception;

class AlunosPostgres implements IRepository, IRepositoryRemove {

    protected $db;
    protected $builder;
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('instituicao.alunos a');
    }

    public function getAll(array $filters = []): array {
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
    public function getById(string $id): Aluno {
        $this->builder->where('id', $id);
        $data = (array)$this->builder->get()->getRow();
        return new Aluno($data);
    }
    public function create(object $aluno): void {
        if (!$this->builder->insert($aluno->getAllProps())) {
            $error = $this->db->error();
            throw new Exception($error['message'], $error['code']);
        }
    }
    public function update(object $aluno): void {
        if (!$this->builder->update($aluno->getAllProps(), ['id' => $aluno->getId()])) {
            $error = $this->db->error();
            throw new Exception($error['message'], $error['code']);
        }
    }
    public function remove(string $id): void {
        if (!$this->builder->delete(['id' => $id])) {
            $error = $this->db->error();
            throw new Exception($error['message'], $error['code']);
        }
    }
    public function getIdAndNameOfAllToSelectInput(): array {
        return $this->builder->select('a.id, a.nome')->get()->getResult();
    }

}