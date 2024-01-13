<?php
namespace App\LayerDomain\UseCases;

use App\LayerDomain\_Validations\TpAtividadeValidation;
use App\LayerDomain\Entities\TpAtividade;
use App\LayerDomain\Interfaces\IRepository;
use App\LayerDomain\Interfaces\IUuid;

class TpAtividadeUseCase {

    protected IUuid $uuid;
    protected IRepository $repository;
    public function __construct(IUuid $instance_uuid, IRepository $instance_repo_tpatividade) {
        $this->uuid = $instance_uuid;
        $this->repository = $instance_repo_tpatividade;
    }

    public function listarTpAtividades(array $filters): array|string {
        return $this->repository->getAll($filters);
    }
    public function detalharTpAtividade(string $id): TpAtividade {
        return $this->repository->getById($id);
    }
    public function cadastrarTpAtividade(array $data): void {
        TpAtividadeValidation::nome($data['nome']);
        TpAtividadeValidation::curricular($data['curricular']);
        TpAtividadeValidation::limite_hora($data['limite_hora']);
        $data['id'] = $this->uuid->generate();
        $data['created_at'] = date("Y-m-d H:i:s");

        $this->repository->create(new TpAtividade($data));
        // print_r($data);
    }
    public function atualizarTpAtividade(string $id, array $data): void {
        $data['id'] = $id;
        $this->repository->update(new TpAtividade($data));
    }
    public function removerTpAtividade(string $id): void {
        $this->repository->remove($id);
    }

}