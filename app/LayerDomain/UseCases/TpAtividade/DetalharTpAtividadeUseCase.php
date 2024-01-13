<?php
namespace App\LayerDomain\UseCases\TpAtividade;

use App\LayerDomain\Entities\TpAtividade;
use App\LayerDomain\Interfaces\IRepository;

class DetalharTpAtividadeUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo_tpatividade) {
        $this->repository = $instance_repo_tpatividade;
    }

    public function execute(string $id): TpAtividade {
        return $this->repository->getById($id);
    }

}