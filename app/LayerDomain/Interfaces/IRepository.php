<?php
namespace App\LayerDomain\Interfaces;

use App\LayerDomain\Entities\Aluno;

interface IRepository {
    public function getAll(array $filters): array;
    public function getById(string $id): Aluno;
    public function create(Aluno $Aluno): void;
    public function update(Aluno $Aluno): void;
    public function remove(string $id): void;
}