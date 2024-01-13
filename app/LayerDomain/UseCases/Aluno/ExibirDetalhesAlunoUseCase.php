<?php
namespace App\LayerDomain\UseCases\Aluno;
use App\LayerDomain\Entities\Aluno;
use App\LayerDomain\Interfaces\IRepository;

class ExibirDetalhesAlunoUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo_aluno) {
        $this->repository = $instance_repo_aluno;
    }

    public function execute(string $id): Aluno {
        return $this->repository->getById($id);
    }
}