<?php
namespace App\LayerDomain\UseCases\Aluno;

use App\LayerDomain\_Validations\AlunoValidation;
use App\LayerDomain\Entities\Aluno;
use App\LayerDomain\Interfaces\IRepository;

class AtualizarAlunoUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo_aluno) {
        $this->repository = $instance_repo_aluno;
    }

    public function execute(string $id, array $data): void {
        AlunoValidation::all($data);
        $data['id'] = $id;
        $this->repository->update(new Aluno($data));
    }

}