<?php
namespace App\LayerDomain\UseCases\Aluno;

use App\LayerDomain\_Validations\AlunoValidation;
use App\LayerDomain\Entities\Aluno;
use App\LayerDomain\Interfaces\IRepository;
use App\LayerDomain\Interfaces\IUuid;

class CadastrarAlunoUseCase {

    protected IUuid $uuid;
    protected IRepository $repository;
    public function __construct(IUuid $instance_uuid, IRepository $instance_repo_aluno) {
        $this->uuid = $instance_uuid;
        $this->repository = $instance_repo_aluno;
    }

    public function execute(array $data): void {
        AlunoValidation::all($data);
        $data['id'] = $this->uuid->generate();
        $data['created_at'] = date("Y-m-d H:i:s");

        $this->repository->create(new Aluno($data));
    }

}