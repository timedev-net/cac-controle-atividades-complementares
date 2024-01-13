<?php
namespace App\LayerDomain\UseCases\AtividadeComplementar;

use App\LayerDomain\Interfaces\IRepositoryRemove;

class RemoverAtividadeComplementarUseCase {

    protected IRepositoryRemove $repository;
    public function __construct(IRepositoryRemove $instance_repo) {
        $this->repository = $instance_repo;
    }

    public function execute(string $id): void {
        $this->repository->remove($id);
    }

}