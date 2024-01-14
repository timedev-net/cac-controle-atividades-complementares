<?php

namespace App\LayerExternal\Controllers;

use App\LayerDomain\UseCases\TpAtividade\AtualizarTpAtividadeUseCase;
use App\LayerDomain\UseCases\TpAtividade\CadastrarTpAtividadeUseCase;
use App\LayerDomain\UseCases\TpAtividade\DetalharTpAtividadeUseCase;
use App\LayerDomain\UseCases\TpAtividade\ListarTpAtividadesUseCase;
use App\LayerDomain\UseCases\TpAtividade\RemoverTpAtividadeUseCase;
use App\LayerDomain\UseCases\TpAtividadeUseCase;
use App\LayerExternal\Adapters\UuidAdapter;
use App\LayerExternal\Repositories\InPostgres\TpsAtividadesRepo;
// use App\Modules\TpAtividade\Utils\TpAtividadeValidate;
use CodeIgniter\Database\Exceptions\DatabaseException;


class TpAtividadeController extends _BaseController
{
    private $repo;
    protected $helpers = ['form'];

    public function __construct() {
        $this->repo = new TpsAtividadesRepo();
        // $this->useCase = new TpAtividadeUseCase(new UuidAdapter(), new TpsAtividadesRepo());
    }

    public function index(): string
    {
        $useCase = new ListarTpAtividadesUseCase($this->repo);
        $data = $useCase->execute($_GET);

        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }

        return view('TpAtividadeViews/index', $data);
    }

    public function showFormCreate(): string
    {
        return view('TpAtividadeViews/form');
    }

    public function create()
    {
        // if (!$this->validate(TpAtividadeValidate::getRulesValidation())) {
        //     return redirect()->back()->withInput();
        // }
        $useCase = new CadastrarTpAtividadeUseCase(new UuidAdapter(), $this->repo);
        $useCase->execute($_POST);
        $this->session->setFlashdata('success', 'Registro cadastrado com sucesso!');
        return redirect()->to('/tp-atividades');
    }

    public function showFormEdit($id): string
    {
        $useCase = new DetalharTpAtividadeUseCase($this->repo);
        $data = $useCase->execute($id);
        // $data['id'] = $id;
        return view('TpAtividadeViews/form', $data->getAllProps());
    }

    public function update($id)
    {
        // if (!$this->validate(TpAtividadeValidate::getRulesValidation())) {
        //     return redirect()->back()->withInput();
        // }
        $useCase = new AtualizarTpAtividadeUseCase($this->repo);
        $useCase->execute($id, $_POST);
        $this->session->setFlashdata('success', 'Registro atualizado com sucesso!');
        return redirect()->to('/tp-atividades');
    }

    public function delete($id)
    {
        try {
            $useCase = new RemoverTpAtividadeUseCase($this->repo);
            $useCase->execute($id);
            $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
            return redirect()->to('/tp-atividades');
        } catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao excluir o registro!');
            return redirect()->to('/tp-atividades');
        }
    }
}
