<?php
namespace App\LayerDomain\UseCases\AtividadeComplementar;

use App\LayerDomain\_Validations\AtividadeComplementarValidation;
use App\LayerDomain\Entities\AtividadeComplementar;
use App\LayerDomain\Interfaces\IRepository;

class AtualizarAtividadeComplementarUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo) {
        $this->repository = $instance_repo;
    }

    public function execute(string $id, array $data): void {
        AtividadeComplementarValidation::all($data);
        $data['id'] = $id;
        $this->repository->update(new AtividadeComplementar($data));
    }

}