<?php
namespace App\LayerDomain\UseCases\TpAtividade;

use App\LayerDomain\Interfaces\IRepositoryRemove;

class RemoverTpAtividadeUseCase {

    protected IRepositoryRemove $repository;
    public function __construct(IRepositoryRemove $instance_repo_tpatividade) {
        $this->repository = $instance_repo_tpatividade;
    }

    public function execute(string $id): void {
        $this->repository->remove($id);
    }

}