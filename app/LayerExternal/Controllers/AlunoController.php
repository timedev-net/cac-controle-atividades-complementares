<?php
namespace App\LayerExternal\Controllers;

use App\LayerDomain\UseCases\AlunoUseCase;
use App\LayerExternal\Adapters\UuidAdapter;
use App\LayerExternal\Repositories\InPostgres\AlunoModel;
use App\LayerExternal\Validations\AlunoValidate;
use CodeIgniter\Database\Exceptions\DatabaseException;

class AlunoController extends _BaseController
{
    private $useCase;
    protected $helpers = ['form'];

    public function __construct() {
        $this->useCase = new AlunoUseCase(new UuidAdapter(), new AlunoModel());
    }

    public function index() {
        $data = $this->useCase->listarAlunos($_GET);
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('AlunoViews/index', $data);
    }

    public function showFormCreate(): string {
        return view('AlunoViews/form');
    }

    public function create() {
        if (!$this->validate(AlunoValidate::getRulesValidation(null))) {
            return redirect()->back()->withInput();
        }
        $this->useCase->cadastrarAluno($_POST);
        $this->session->setFlashdata('success', 'Aluno cadastrado com sucesso!');
        return redirect()->to('/alunos');
    }

    public function showFormEdit($id) {
        $data = $this->useCase->detalharAluno($id);
        return view('AlunoViews/form', $data->getAllProps());
    }

    public function update($id) {
        if (!$this->validate(AlunoValidate::getRulesValidation($id))) {
            return redirect()->back()->withInput();
        }
        $this->useCase->atualizarAluno($id, $_POST);
        $this->session->setFlashdata('success', 'Aluno atualizado com sucesso!');
        return redirect()->to('/alunos');
    }

    public function delete($id) {
        try {
            // $this->model->deletar($id);
            $this->useCase->removerAluno($id);
            $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
            return redirect()->to('/alunos');
        } catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao excluir o registro!');
            return redirect()->to('/alunos');
        }
    }
}
