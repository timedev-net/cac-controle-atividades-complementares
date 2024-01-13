<?php
namespace App\LayerDomain\UseCases\AtividadeComplementar;

use App\LayerDomain\Entities\AtividadeComplementar;
use App\LayerDomain\Interfaces\IRepository;

class DetalharAtividadeComplementarUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo) {
        $this->repository = $instance_repo;
    }
    public function execute(string $id): AtividadeComplementar {
        return $this->repository->getById($id);
    }

}