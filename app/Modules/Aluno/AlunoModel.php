<?php

namespace App\Modules\Aluno;

// use App\Modules\BaseController;


use CodeIgniter\Model;

class AlunoModel extends Model 
{
    public function __construct() {
        parent::__construct();
        $this->db = db_connect();
        $this->builder = $this->db->table('alunos a');
    }

    
    public function getAll($filters = []): array
    {
        $filters = array_merge(['search' => '', 'page' => 1, 'perPage' => 10], $filters);
        $offset = ($filters['page'] - 1) * $filters['perPage'];
        
        // $this->builder->select('a.nome');
        $this->builder->like("a.nome", $filters['search'],'both',null,true);
        $this->builder->limit($filters['perPage'], $offset);

        $data = $this->builder->get()->getResult();
        $total = $this->db->query('select count(a.*) from alunos a')->getResult();
        $totalPages = ceil($total[0]->count/$filters['perPage']);

        return [
            'data' => $data,
            'page' => $filters['page'],
            'perPage' => $filters['perPage'],
            'totalItens' => $total[0]->count,
            'totalPages' => $totalPages,
        ];
    }

    public function cadastrar($data) {
        $this->builder->insert($data);
    }
    public function atualizar($id, $data) {

    }
}

// $this->db->query("select a.* from alunos a
        //     where a.nome = ?
        //     limit {$filters['perPage']} offset $offset", []);