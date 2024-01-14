<?php

namespace App\LayerExternal\Controllers;

use App\LayerDomain\UseCases\AtividadeComplementar\AnalisarAtividadeComplementarUseCase;
use App\LayerDomain\UseCases\AtividadeComplementar\AtualizarAtividadeComplementarUseCase;
use App\LayerDomain\UseCases\AtividadeComplementar\CadastrarAtividadeComplementarUseCase;
use App\LayerDomain\UseCases\AtividadeComplementar\DetalharAtividadeComplementarUseCase;
use App\LayerDomain\UseCases\AtividadeComplementar\ListarAtividadeComplementarsUseCase;
use App\LayerDomain\UseCases\AtividadeComplementar\RemoverAtividadeComplementarUseCase;
use App\LayerExternal\Adapters\UuidAdapter;
use App\LayerExternal\Repositories\InPostgres\AlunosPostgres;
use App\LayerExternal\Repositories\InPostgres\AtividadesComplementaresRepo;
use App\LayerExternal\Repositories\InPostgres\TpsAtividadesRepo;
use App\LayerExternal\Validations\AtividadeComplementarValidate;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Error;
use Exception;

class AtividadeComplementarController extends _BaseController
{
    protected $helpers = ['form'];

    // public function __construct() {
    //     // $this->useCase = new AtividadesComplementaresRepo();
    //     $this->useCase = new AtividadeComplementarUseCase(new UuidAdapter(), new AtividadesComplementaresRepo());
    // }

    public function index(): string
    {
        try {
            $useCase = new ListarAtividadeComplementarsUseCase(new AtividadesComplementaresRepo());
            $data = $useCase->execute($_GET);
            if (!empty($this->session->getFlashdata())) $data['message'] = $this->session->getFlashdata();
            return view('AtividadeComplementarViews/index', $data);
        } catch (\Throwable $e) { // validação do domínio
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function showForm($id = null): string {
        $alunos = new AlunosPostgres();
        $tp_atividades = new TpsAtividadesRepo();

        $data = [
            'alunos' => $alunos->getIdAndNameOfAllToSelectInput(),
            'tp_atividades' => $tp_atividades->getIdAndNameOfAllToSelectInput()
        ];

        if (isset($id)) {
            $useCase = new DetalharAtividadeComplementarUseCase(new AtividadesComplementaresRepo());
            $data['id'] = $id;
            $data['data'] = $useCase->execute($id)->getAllProps();
        }

        return view('AtividadeComplementarViews/form', $data);
    }

    public function save($id = null) {
        try {
            $repo = new AtividadesComplementaresRepo();
            if (isset($id)) {
                $useCase = new AtualizarAtividadeComplementarUseCase($repo);
                $useCase->execute($id, $_POST);
            } else {
                $useCase = new CadastrarAtividadeComplementarUseCase(new UuidAdapter, $repo);
                $useCase->execute($_POST);
            }
            $this->session->setFlashdata('success', 'Atividade complementar cadastrada com sucesso!');
            return redirect()->to('/atividades-complementares');
        }
        catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao salvar registro no banco de dados!');
            return redirect()->to('/atividades-complementares');
        }
        catch (Exception $e) {
            $this->session->setFlashdata('error', $e->getMessage());
            if (!$this->validate(AtividadeComplementarValidate::getRulesValidation())) {
                return redirect()->back()->withInput();
            }
            return redirect()->to('/atividades-complementares');
        }
        catch (Error $e) {
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->to('/atividades-complementares');
        }
    }

    public function delete($id) {
        try {
            $useCase = new RemoverAtividadeComplementarUseCase(new AtividadesComplementaresRepo());
            $useCase->execute($id);
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

    public function showFormAnalisarAtividade($id) {
        $alunos = new AlunosPostgres();
        $tp_atividades = new TpsAtividadesRepo();
        $useCase = new DetalharAtividadeComplementarUseCase(new AtividadesComplementaresRepo());
        $atv_comp = $useCase->execute($id);
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
        try {
            $useCase = new AnalisarAtividadeComplementarUseCase(new AtividadesComplementaresRepo());
            $useCase->execute($id, $_POST);
            $this->session->setFlashdata('success', 'Atividade analisada com sucesso!');
            return redirect()->to('/atividades-complementares');
        }
        catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao salvar registro no banco de dados!');
            return redirect()->to('/atividades-complementares');
        }
        catch (Exception $e) {
            $this->session->setFlashdata('error', $e->getMessage());
            if (!$this->validate(AtividadeComplementarValidate::getRulesValidation())) {
                return redirect()->back()->withInput();
            }
            return redirect()->to('/atividades-complementares');
        }
        catch (Error $e) {
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->to('/atividades-complementares');
        }
    }
}
