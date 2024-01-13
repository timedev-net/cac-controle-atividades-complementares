<?php
namespace App\LayerExternal\Controllers\Alunos;

use App\LayerDomain\UseCases\Aluno\AtualizarAlunoUseCase;
use App\LayerDomain\UseCases\Aluno\CadastrarAlunoUseCase;
use App\LayerExternal\Adapters\UuidAdapter;
use App\LayerExternal\Controllers\_BaseController;
use App\LayerExternal\Repositories\InPostgres\AlunosRepo;
use App\LayerExternal\Validations\AlunoValidate;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Error;
use Exception;

class SalvarAlunoController extends _BaseController
{
    public function execute($id = null) {
        try {
            $repo = new AlunosRepo();
            if (isset($id)) {
                $useCase = new AtualizarAlunoUseCase($repo);
                $useCase->execute($id, $_POST);
            } else {
                $useCase = new CadastrarAlunoUseCase(new UuidAdapter, $repo);
                $useCase->execute($_POST);
            }
            $this->session->setFlashdata('success', 'Registro do aluno(a) salvo com sucesso!');
            return redirect()->to('/alunos');
        }
        catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao salvar aluno(a) no banco de dados!');
            return redirect()->to('/alunos');
        }
        catch (Exception $e) {
            $this->session->setFlashdata('error', $e->getMessage());
            if (!$this->validate(AlunoValidate::getRulesValidation(null))) {
                return redirect()->back()->withInput();
            }
            return redirect()->to('/alunos');
        }
        catch (Error $e) {
            $this->session->setFlashdata('error', $e->getMessage());
            return redirect()->to('/alunos');
        }
    }
}
