<?php

namespace App\Modules\TpAtividade;

use App\Modules\BaseController;
use App\Modules\TpAtividade\Utils\TpAtividadeValidate;
use CodeIgniter\Database\Exceptions\DatabaseException;


class TpAtividadeController extends BaseController
{
    private $model;
    protected $helpers = ['form'];

    public function __construct() {
        $this->model = new TpAtividadeModel();
    }

    public function index(): string
    {
        $data = $this->model->getAll($_GET);

        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        
        return view('TpAtividade/Views/index', $data);
    }

    public function showFormCreate(): string
    {
        return view('TpAtividade/Views/form');
    }

    public function create()
    {
        if (!$this->validate(TpAtividadeValidate::getRulesValidation())) {
            return redirect()->back()->withInput();
        }
        $this->model->cadastrar($_POST);
        $this->session->setFlashdata('success', 'TpAtividade cadastrado com sucesso!');
        return redirect()->to('/TpAtividades');
    }

    public function showFormEdit($id): string
    {
        $data = $this->model->getById($id);
        $data['id'] = $id;
        return view('TpAtividade/Views/form', $data);
    }

    public function update($id)
    {
        if (!$this->validate(TpAtividadeValidate::getRulesValidation())) {
            return redirect()->back()->withInput();
        }
        $this->model->atualizar($id, $_POST);
        $this->session->setFlashdata('success', 'TpAtividade atualizado com sucesso!');
        return redirect()->to('/TpAtividades');
    }

    public function delete($id)
    {
        try {
            $this->model->deletar($id);
            $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
            return redirect()->to('/TpAtividades');
        } catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao excluir o registro!');
            return redirect()->to('/TpAtividades');
        }
    }
}
