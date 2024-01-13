<?php
namespace App\LayerExternal\Controllers\Alunos;

use App\LayerDomain\UseCases\Aluno\RemoverAlunoUseCase;
use App\LayerExternal\Controllers\_BaseController;
use App\LayerExternal\Repositories\InPostgres\AlunosRepo;
use CodeIgniter\Database\Exceptions\DatabaseException;

class RemoverAlunoController extends _BaseController
{
    public function execute($id) {

        try {
            $useCase = new RemoverAlunoUseCase(new AlunosRepo());
            $useCase->execute($id);
            $this->session->setFlashdata('success', 'Registro excluído com sucesso!');
        } catch (DatabaseException $e) {
            $this->session->setFlashdata('error', 'Erro ao excluir o registro do banco de dados!');
        } catch (\Throwable $th) {
            $this->session->setFlashdata('error', $th->getMessage());
        } finally {
            return redirect()->back();
        }
    }
}
