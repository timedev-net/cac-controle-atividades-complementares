<?php
namespace App\LayerDomain\UseCases\AtividadeComplementar;

use App\LayerDomain\_Validations\AtividadeComplementarValidation;
use App\LayerDomain\Entities\AtividadeComplementar;
use App\LayerDomain\Interfaces\IRepository;
use App\LayerDomain\Interfaces\IUuid;

class CadastrarAtividadeComplementarUseCase {

    protected IUuid $uuid;
    protected IRepository $repository;
    public function __construct(IUuid $instance_uuid, IRepository $instance_repo) {
        $this->uuid = $instance_uuid;
        $this->repository = $instance_repo;
    }

    public function execute(array $data): void {
        AtividadeComplementarValidation::all($data);

        $data['id'] = $this->uuid->generate();
        $data['created_at'] = date("Y-m-d H:i:s");

        $this->repository->create(new AtividadeComplementar($data));
    }

}