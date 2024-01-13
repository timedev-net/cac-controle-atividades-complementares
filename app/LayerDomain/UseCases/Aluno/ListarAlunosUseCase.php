<?php
namespace App\LayerDomain\UseCases\Aluno;

use App\LayerDomain\Interfaces\IRepository;

class ListarAlunosUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo_aluno) {
        $this->repository = $instance_repo_aluno;
    }

    public function execute(array $filters): array|string {
        return $this->repository->getAll($filters);
    }
}