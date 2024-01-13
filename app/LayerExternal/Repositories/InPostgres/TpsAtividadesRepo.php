<?php

namespace App\LayerExternal\Repositories\InPostgres;

use App\LayerDomain\Interfaces\Repository;
use App\LayerDomain\Entities\TpAtividade;
use App\LayerDomain\Interfaces\IRepository;
// use CodeIgniter\Model;
use Exception;

// class TpsAtividadesRepo extends Repository {
class TpsAtividadesRepo implements IRepository {

    protected $db;
    protected $builder;
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('atividades.tp_atividades a');
    }

    public function getAll(array $filters = []): array {
        $filters = array_merge(['search' => '', 'page' => 1, 'perPage' => 10], $filters);
        $offset = ($filters['page'] - 1) * $filters['perPage'];

        // $this->builder->select('a.nome');
        $this->builder->like("a.nome", $filters['search'], 'both', null, true);
        $this->builder->limit($filters['perPage'], $offset);
        $this->builder->orderBy('a.nome', 'asc');

        $data = $this->builder->get()->getResult();
        $total = $this->db->query('select count(a.*) from atividades.tp_atividades a')->getResult();
        $totalPages = ceil($total[0]->count / $filters['perPage']);

        return [
            'data' => $data,
            'page' => $filters['page'],
            'perPage' => $filters['perPage'],
            'totalItens' => $total[0]->count,
            'totalPages' => $totalPages,
        ];
    }
    public function getById(string $id): TpAtividade {
        $this->builder->where('id', $id);
        $data = (array)$this->builder->get()->getRow();
        return new TpAtividade($data);
    }
    public function create(object $data): void {
        if (!$this->builder->insert($data->getAllProps())) {
            $error = $this->db->error();
            throw new Exception($error['message'], $error['code']);
        }
    }
    public function update(object $data): void {
        if (!$this->builder->update($data->getAllProps(), ['id' => $data->getId()])) {
            $error = $this->db->error();
            throw new Exception($error['message'], $error['code']);
        }
    }
    // public function remove(string $id): void {
    //     if (!$this->builder->delete(['id' => $id])) {
    //         $error = $this->db->error();
    //         throw new Exception($error['message'], $error['code']);
    //     }
    // }
    public function getIdAndNameOfAllToSelectInput(): array {
        return $this->builder->select('a.id, a.nome, a.curricular')->get()->getResult();
    }

}