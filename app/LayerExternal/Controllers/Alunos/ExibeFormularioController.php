<?php
namespace App\LayerExternal\Controllers\Alunos;

use App\LayerDomain\UseCases\Aluno\ExibirDetalhesAlunoUseCase;
use App\LayerExternal\Controllers\_BaseController;
use App\LayerExternal\Repositories\InPostgres\AlunosRepo;

class ExibeFormularioController extends _BaseController
{
    protected $helpers = ['form'];
    public function execute($id = null): mixed {
        try {
            $data = [];
            if (!empty($this->session->getFlashdata())) $data['message'] = $this->session->getFlashdata();

            if (isset($id)) {
                $useCase = new ExibirDetalhesAlunoUseCase(new AlunosRepo());
                $data = $useCase->execute($id)->getAllProps();
            }

            return view('AlunoViews/form', $data);
        } catch (\Throwable $th) {
            $this->session->setFlashdata('error', $th->getMessage());
            return redirect()->to('/');
        }
    }
}
