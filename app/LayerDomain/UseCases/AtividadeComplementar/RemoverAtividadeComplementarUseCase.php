<?php
namespace App\LayerDomain\UseCases\AtividadeComplementar;

use App\LayerDomain\Interfaces\IRepository;

class RemoverAtividadeComplementarUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo) {
        $this->repository = $instance_repo;
    }

    public function execute(string $id): void {
        $this->repository->remove($id);
    }

}