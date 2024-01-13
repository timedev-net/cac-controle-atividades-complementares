<?php
namespace App\LayerDomain\UseCases\TpAtividade;

use App\LayerDomain\Interfaces\IRepository;

class RemoverTpAtividadeUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo_tpatividade) {
        $this->repository = $instance_repo_tpatividade;
    }

    public function execute(string $id): void {
        $this->repository->remove($id);
    }

}