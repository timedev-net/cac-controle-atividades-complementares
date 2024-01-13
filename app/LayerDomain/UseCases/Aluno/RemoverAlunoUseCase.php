<?php
namespace App\LayerDomain\UseCases\Aluno;
use App\LayerDomain\Interfaces\IRepositoryRemove;

class RemoverAlunoUseCase {

    protected IRepositoryRemove $repository;
    public function __construct(IRepositoryRemove $instance_repo_aluno) {
        $this->repository = $instance_repo_aluno;
    }

    public function execute(string $id): void {
        $this->repository->remove($id);
    }

}