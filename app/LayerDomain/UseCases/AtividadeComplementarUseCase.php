<?php
namespace App\LayerDomain\UseCases;

use App\LayerDomain\_Validations\AtividadeComplementarValidation;
use App\LayerDomain\Entities\AtividadeComplementar;
use App\LayerDomain\Interfaces\IRepository;
use App\LayerDomain\Interfaces\IUuid;

class AtividadeComplementarUseCase {

    protected IUuid $uuid;
    protected IRepository $repository;
    public function __construct(IUuid $instance_uuid, IRepository $instance_repo) {
        $this->uuid = $instance_uuid;
        $this->repository = $instance_repo;
    }
    public function listarAtividadeComplementars(array $filters): array|string {
        return $this->repository->getAll($filters);
    }
    public function detalharAtividadeComplementar(string $id): AtividadeComplementar {
        return $this->repository->getById($id);
    }
    public function cadastrarAtividadeComplementar(array $data): void {
        AtividadeComplementarValidation::all($data);

        $data['id'] = $this->uuid->generate();
        $data['created_at'] = date("Y-m-d H:i:s");

        $this->repository->create(new AtividadeComplementar($data));
        // print_r($data);
    }
    public function atualizarAtividadeComplementar(string $id, array $data): void {
        AtividadeComplementarValidation::all($data);
        $data['id'] = $id;
        $this->repository->update(new AtividadeComplementar($data));
    }
    public function analisarAtividadeComplementar(string $id, array $data): void {
        AtividadeComplementarValidation::analise($data);
        $data['id'] = $id;
        $this->repository->update(new AtividadeComplementar($data));
    }
    public function removerAtividadeComplementar(string $id): void {
        $this->repository->remove($id);
    }

}