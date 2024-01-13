<?php
namespace App\LayerDomain\UseCases\AtividadeComplementar;

use App\LayerDomain\Interfaces\IRepository;

class ListarAtividadeComplementarsUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo) {
        $this->repository = $instance_repo;
    }
    public function execute(array $filters): array|string {
        return $this->repository->getAll($filters);
    }

}