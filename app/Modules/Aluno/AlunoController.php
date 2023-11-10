<?php

namespace App\Modules\Aluno;

use App\LayerDomain\UseCases\AlunoUseCases;
use App\LayerInfrastructure\Adapters\UuidAdapter;
use App\LayerInfrastructure\InPostgres\AlunoPostgres;
use App\Modules\Aluno\Utils\AlunoValidate;
use App\Modules\BaseController;
use CodeIgniter\Database\Exceptions\DatabaseException;

class AlunoController extends BaseController
{
    private $model;
    private $useCase;
    protected $helpers = ['form'];

    public function __construct() {
        $this->model = new AlunoModel();
        $uuid = new UuidAdapter();
        $repo = new AlunoPostgres();
        $this->useCase = new AlunoUseCases($uuid, $repo);
    }

    public function index(): string
    {
        // $data = $this->model->getAll($_GET);
        $data = $this->useCase->listarAlunos($_GET);
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('Aluno/Views/index', $data);
    }

    public function showFormCreate(): string
    {
        return view('Aluno/Views/form');
    }

    public function create()
    {
        if (!$this->validate(AlunoValidate::getRulesValidation(null))) {
            return redirect()->back()->withInput();
        }
        $this->model->cadastrar($_POST);
        $this->session->setFlashdata('success', 'Aluno cadastrado com sucesso!');
        return redirect()->to('/alunos');
    }

    public function showFormEdit($id): string
    {
        $data = (array)$this->model->getById($id);
        return view('Aluno/Views/form', $data);
    }

    public function update($id)
    {
        if (!$this->validate(AlunoValidate::getRulesValidation($id))) {
            return redirect()->back()->withInput();
        }
        $this->model->atualizar($id, $_POST);
        $this->session->setFlashdata('success', 'Aluno atualizado com sucesso!');
        return redirect()->to('/alunos');
    }

    public function delete($id)
    {
        try {
            $this->model->deletar($id);
            $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
            return redirect()->to('/alunos');
        } catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao excluir o registro!');
            return redirect()->to('/alunos');
        }
    }
}
