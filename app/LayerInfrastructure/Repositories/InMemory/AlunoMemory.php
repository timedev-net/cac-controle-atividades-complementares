<?php

namespace App\LayerInfrastructure\Repositories\InMemory;

use App\LayerDomain\Interfaces\IRepository;
use Exception;

class AlunoMemory implements IRepository {

    private array $repo;

    public function getAll($filters): array {
        return $this->repo;
    }
    public function getById($id): object {
        $novo_repo = array_filter($this->repo, fn($e) => $e->id == $id);
        if (sizeof($novo_repo) > 0) {
            return $novo_repo[0];
        }
        throw new Exception("Id não encontrado no repositório");
    }
    public function create(object $object): void {
        array_unshift($this->repo, $object);
    }
    public function update(object $object): void {
        $novo_repo = array_filter($this->repo, fn($e) => $e->id != $object->id);
        array_unshift($novo_repo, $object);
        $this->repo = $novo_repo;
    }
    public function delete(string $id): void {
        $novo_repo = array_filter($this->repo, fn($e) => $e->id != $id);
        $this->repo = $novo_repo;
    }

}