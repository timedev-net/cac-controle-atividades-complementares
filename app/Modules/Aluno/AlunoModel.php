<?php

namespace App\Modules\Aluno;

use CodeIgniter\Model;

class AlunoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
        $this->builder = $this->db->table('alunos a');
    }

    public function getAll($filters = []): array
    {
        $filters = array_merge(['search' => '', 'page' => 1, 'perPage' => 10], $filters);
        $offset = ($filters['page'] - 1) * $filters['perPage'];

        // $this->builder->select('a.nome');
        $this->builder->like("a.nome", $filters['search'], 'both', null, true);
        $this->builder->limit($filters['perPage'], $offset);
        $this->builder->orderBy('a.nome', 'asc');

        $data = $this->builder->get()->getResult();
        $total = $this->db->query('select count(a.*) from alunos a')->getResult();
        $totalPages = ceil($total[0]->count / $filters['perPage']);

        return [
            'data' => $data,
            'page' => $filters['page'],
            'perPage' => $filters['perPage'],
            'totalItens' => $total[0]->count,
            'totalPages' => $totalPages,
        ];
    }

    public function getById($id)
    {
        $this->builder->where('id', $id);
        $data = $this->builder->get()->getResult();
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
