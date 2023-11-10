<?php
namespace App\LayerDomain\UseCases;

use App\LayerDomain\Entities\Aluno;
use App\LayerDomain\Interfaces\IRepository;
use App\LayerDomain\Interfaces\IUuid;

class AlunoUseCase {

    protected IUuid $uuid;
    protected IRepository $repository;
    public function __construct(IUuid $instance_uuid, IRepository $instance_repo_aluno) {
        $this->uuid = $instance_uuid;
        $this->repository = $instance_repo_aluno;
    }

    public function listarAlunos(array $filters): array|string {
        return $this->repository->getAll($filters);
    }
    public function detalharAluno(string $id): Aluno {
        return $this->repository->getById($id);
    }
    public function cadastrarAluno(array $data): void {
        // chama a validação do nome
        // chama a validação do email
        // chama a validação da matricula
        $data['id'] = $this->uuid->generate();
        $data['created_at'] = date("Y-m-d H:i:s");
        $this->repository->create(new Aluno($data));
    }
    public function atualizarAluno(string $id, array $data): void {
        $data['id'] = $id;
        $this->repository->update(new Aluno($data));
    }
    public function removerAluno(string $id): void {
        $this->repository->remove($id);
    }

}