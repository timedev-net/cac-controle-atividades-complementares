<?php
namespace App\LayerDomain\UseCases\TpAtividade;

use App\LayerDomain\Interfaces\IRepository;

class ListarTpAtividadesUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo_tpatividade) {
        $this->repository = $instance_repo_tpatividade;
    }

    public function execute(array $filters): array|string {
        return $this->repository->getAll($filters);
    }

}