<?php
namespace App\LayerDomain\UseCases\TpAtividade;

use App\LayerDomain\_Validations\TpAtividadeValidation;
use App\LayerDomain\Entities\TpAtividade;
use App\LayerDomain\Interfaces\IRepository;
use App\LayerDomain\Interfaces\IUuid;

class CadastrarTpAtividadeUseCase {

    protected IUuid $uuid;
    protected IRepository $repository;
    public function __construct(IUuid $instance_uuid, IRepository $instance_repo_tpatividade) {
        $this->uuid = $instance_uuid;
        $this->repository = $instance_repo_tpatividade;
    }

    public function execute(array $data): void {
        TpAtividadeValidation::all($data);
        $data['id'] = $this->uuid->generate();
        $data['created_at'] = date("Y-m-d H:i:s");

        $this->repository->create(new TpAtividade($data));
    }

}