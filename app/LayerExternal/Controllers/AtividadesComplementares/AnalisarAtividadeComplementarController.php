<?php

namespace App\LayerExternal\Controllers;

use App\LayerDomain\UseCases\AtividadeComplementarUseCase;
use App\LayerExternal\Adapters\UuidAdapter;
use App\LayerExternal\Repositories\InPostgres\AlunoModel;
use App\LayerExternal\Repositories\InPostgres\AtividadeComplementarModel;
use App\LayerExternal\Repositories\InPostgres\TpAtividadeModel;
use App\LayerExternal\Validations\AtividadeComplementarValidate;
use CodeIgniter\Database\Exceptions\DatabaseException;

class AnalisarAtividadeComplementarController extends _BaseController
{
    private $useCase;
    protected $helpers = ['form'];

    public function __construct() {
        // $this->useCase = new AtividadeComplementarModel();
        $this->useCase = new AtividadeComplementarUseCase(new UuidAdapter(), new AtividadeComplementarModel());
    }

    public function index(): string
    {
        try {
            $data = $this->useCase->listarAtividadeComplementars($_GET);
            if (!empty($this->session->getFlashdata())) $data['message'] = $this->session->getFlashdata();
            return view('AtividadeComplementarViews/index', $data);
        } catch (\Throwable $e) { // validação do domínio
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function showFormCreate(): string
    {
        $alunos = new AlunoModel();
        $tp_atividades = new TpAtividadeModel();
        $data = [
            'alunos' => $alunos->getIdAndNameOfAllToSelectInput(),
            'tp_atividades' => $tp_atividades->getIdAndNameOfAllToSelectInput()
        ];
        return view('AtividadeComplementarViews/form', $data);
    }

    public function create() {
        if (!$this->validate(AtividadeComplementarValidate::getRulesValidation())) {
            return redirect()->back()->withInput();
        }
        try {
            $this->useCase->cadastrarAtividadeComplementar($_POST);
            $this->session->setFlashdata('success', 'Atividade complementar cadastrada com sucesso!');
            return redirect()->to('/atividades-complementares');
        } catch (\Throwable $e) { // validação do domínio
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function showFormEdit($id): string {
        $alunos = new AlunoModel();
        $tp_atividades = new TpAtividadeModel();
        $data = [
            'id' => $id,
            'data' => $this->useCase->detalharAtividadeComplementar($id)->getAllProps(),
            'alunos' => $alunos->getIdAndNameOfAllToSelectInput(),
            'tp_atividades' => $tp_atividades->getIdAndNameOfAllToSelectInput()
        ];
        return view('AtividadeComplementarViews/form', $data);
    }

    public function update($id) {
        if (!$this->validate(AtividadeComplementarValidate::getRulesValidation())) {
            return redirect()->back()->withInput();
        }
        try {
            $this->useCase->atualizarAtividadeComplementar($id, $_POST);
            $this->session->setFlashdata('success', 'Atividade complementar atualizada com sucesso!');
            return redirect()->to('/atividades-complementares');
        } catch (\Throwable $e) { // validação do domínio
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function delete($id) {
        try {
            $this->useCase->removerAtividadeComplementar($id);
            $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
            return redirect()->to('/atividades-complementares');
        } catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao excluir o registro do banco de dados!');
            return redirect()->to('/atividades-complementares');
        } catch (\Throwable $e) {
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->to('/atividades-complementares');
        }
    }

    public function analisarAtividadeForm($id) {
        $alunos = new AlunoModel();
        $tp_atividades = new TpAtividadeModel();
        $atv_comp = $this->useCase->detalharAtividadeComplementar($id);
        $data = [
            'id' => $id,
            'data' => $atv_comp->getAllProps(),
            'aluno' => $alunos->getById($atv_comp->getAlunoId())->getAllProps(),
            'tp_atividade' => $tp_atividades->getById($atv_comp->getTpAtividadeId())->getAllProps()
        ];
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('AtividadeComplementarViews/analiseForm', $data);
    }
    public function analisarAtividade($id) {
        if (!$this->validate(AtividadeComplementarValidate::getRulesAnaliseValidation())) { // validação do framework
            return redirect()->back()->withInput();
        }
        try {
            $this->useCase->analisarAtividadeComplementar($id, $_POST);
            $this->session->setFlashdata('success', 'Atividade analisada com sucesso!');
            return redirect()->to('/atividades-complementares');
        } catch (\Throwable $e) { // validação do domínio
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
