<?php

namespace App\Modules\AtividadeComplementar;

use App\Modules\Aluno\AlunoModel;
use App\Modules\BaseController;
use App\Modules\AtividadeComplementar\Utils\AtividadeComplementarValidate;
use App\Modules\TpAtividade\TpAtividadeModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class AtividadeComplementarController extends BaseController
{
    private $model;
    protected $helpers = ['form'];

    public function __construct() {
        $this->model = new AtividadeComplementarModel();
    }

    public function index(): string
    {
        $data = $this->model->getAll($_GET);
        // $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
        // $this->session->setFlashdata('error', 'deu erro!');
        // $this->session->setFlashdata('info', 'agora é só um teste');

        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('AtividadeComplementar/Views/index', $data);
    }

    public function showFormCreate(): string
    {
        $alunos = new AlunoModel();
        $tp_atividades = new TpAtividadeModel();
        $data = [
            'alunos' => $alunos->getAllToSelectInput(),
            'tp_atividades' => $tp_atividades->getAllToSelectInput()
        ];
        return view('AtividadeComplementar/Views/form', $data);
    }

    public function create()
    {
        if (!$this->validate(AtividadeComplementarValidate::getRulesValidation())) {
            // dd('entrou aqui', $_POST);
            return redirect()->back()->withInput();
        }
        $this->model->cadastrar($_POST);
        $this->session->setFlashdata('success', 'Atividade complementar cadastrada com sucesso!');
        return redirect()->to('/atividades-complementares');
    }

    public function showFormEdit($id): string
    {
        $alunos = new AlunoModel();
        $tp_atividades = new TpAtividadeModel();
        $data = [
            'id' => $id,
            'data' => $this->model->getById($id),
            'alunos' => $alunos->getAllToSelectInput(),
            'tp_atividades' => $tp_atividades->getAllToSelectInput()
        ];
        return view('AtividadeComplementar/Views/form', $data);
    }

    public function update($id)
    {
        if (!$this->validate(AtividadeComplementarValidate::getRulesValidation())) {
            return redirect()->back()->withInput();
        }
        $this->model->atualizar($id, $_POST);
        $this->session->setFlashdata('success', 'Atividade complementar atualizada com sucesso!');
        return redirect()->to('/atividades-complementares');
    }

    public function delete($id)
    {
        try {
            $this->model->deletar($id);
            $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
            return redirect()->to('/atividades-complementares');
        } catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao excluir o registro!');
            return redirect()->to('/atividades-complementares');
        }
    }

    public function analisarAtividadeForm($id) {
        $alunos = new AlunoModel();
        $tp_atividades = new TpAtividadeModel();
        $atv_comp = $this->model->getById($id);
        $data = [
            'id' => $id,
            'data' => $atv_comp,
            'aluno' => $alunos->getById($atv_comp->aluno_id),
            'tp_atividade' => $tp_atividades->getById($atv_comp->tp_atividade_id)
        ];
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('AtividadeComplementar/Views/analiseForm', $data);
    }
    public function analisarAtividade($id) {

        if (!empty($_POST['deferida']) && $_POST['deferida'] == 'f' && !$this->validate(AtividadeComplementarValidate::getRulesAnaliseValidation())) {
            $this->session->setFlashdata('error', 'Preencha os campos corretamente!');
            return redirect()->back()->withInput();
        }
        if ($_POST['deferida'] == '') $_POST['deferida'] = null;
        $this->model->atualizar($id, $_POST);
        $this->session->setFlashdata('success', 'Atividade analisada com sucesso!');
        return redirect()->to('/atividades-complementares');
    }
}
