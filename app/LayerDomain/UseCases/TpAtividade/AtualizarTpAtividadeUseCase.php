<?php
namespace App\LayerDomain\UseCases\TpAtividade;

use App\LayerDomain\_Validations\TpAtividadeValidation;
use App\LayerDomain\Entities\TpAtividade;
use App\LayerDomain\Interfaces\IRepository;

class AtualizarTpAtividadeUseCase {

    protected IRepository $repository;
    public function __construct(IRepository $instance_repo_tpatividade) {
        $this->repository = $instance_repo_tpatividade;
    }

    public function execute(string $id, array $data): void {
        TpAtividadeValidation::all($data);
        $data['id'] = $id;
        $this->repository->update(new TpAtividade($data));
    }

}