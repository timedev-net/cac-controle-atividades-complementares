<?php
namespace App\LayerDomain\UseCases\Aluno;
use App\LayerDomain\Interfaces\IRepository;

class RemoverRegistroAlunoUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo_aluno) {
        $this->repository = $instance_repo_aluno;
    }

    public function execute(string $id): void {
        $this->repository->remove($id);
    }

}