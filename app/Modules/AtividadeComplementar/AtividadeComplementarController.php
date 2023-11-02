<?php

namespace App\Modules\AtividadeComplementar;

use App\Modules\BaseController;
use App\Modules\AtividadeComplementar\Utils\AtividadeComplementarValidate;
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
        return view('AtividadeComplementar/Views/form');
    }

    public function create()
    {
        if (!$this->validate(AtividadeComplementarValidate::getRulesValidation())) {
            return redirect()->back()->withInput();
        }
        $this->model->cadastrar($_POST);
        $this->session->setFlashdata('success', 'AtividadeComplementar cadastrado com sucesso!');
        return redirect()->to('/atividadecomplementars');
    }

    public function showFormEdit($id): string
    {
        $data = $this->model->getById($id);
        $data['id'] = $id;
        return view('AtividadeComplementar/Views/form', $data);
    }

    public function update($id)
    {
        if (!$this->validate(AtividadeComplementarValidate::getRulesValidation())) {
            return redirect()->back()->withInput();
        }
        $this->model->atualizar($id, $_POST);
        $this->session->setFlashdata('success', 'AtividadeComplementar atualizado com sucesso!');
        return redirect()->to('/atividadecomplementars');
    }

    public function delete($id)
    {
        try {
            $this->model->deletar($id);
            $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
            return redirect()->to('/atividadecomplementars');
        } catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao excluir o registro!');
            return redirect()->to('/atividadecomplementars');
        }
    }
}
