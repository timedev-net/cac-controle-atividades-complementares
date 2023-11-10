<?php
class AlunoUseCases {

    protected IUuid $uuid;
    protected IRepository $repository;
    public function __construct(IUuid $instance_uuid, IRepository $instance_repo_aluno) {
        $this->uuid = $instance_uuid;
        $this->repository = $instance_repo_aluno;
    }

    public function listarAlunos(array $filters): array|string {
        try {
            return $this->repository->getAll($filters);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
    public function detalharAluno(string $id): Aluno|string {
        try {
            return $this->repository->getById($id);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
    public function cadastrarAluno(string $nome, string $matricula_suap, string $email): ?string {
        try {
            // chama a validação do nome
            // chama a validação do email
            // chama a validação da matricula

            $id = $this->uuid->generate();
            $aluno = new Aluno($id, $nome, $matricula_suap, $email);
            $this->repository->create($aluno);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }

    }
    public function atualizarAluno(string $id, string $nome, string $matricula_suap, string $email): ?string {
        try {
            // chama a validação do nome
            // chama a validação do email
            // chama a validação da matricula

            $aluno = new Aluno($id, $nome, $matricula_suap, $email);
            $this->repository->update($aluno);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
    public function removerAluno(string $id): ?string {
        try {
            // chama a validação do nome
            // chama a validação do email
            // chama a validação da matricula
            $this->repository->delete($id);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
}