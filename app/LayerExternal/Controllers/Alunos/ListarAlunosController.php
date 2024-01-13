<?php
namespace App\LayerExternal\Controllers\Alunos;

use App\LayerDomain\UseCases\Aluno\ListarAlunosUseCase;
use App\LayerExternal\Controllers\_BaseController;
use App\LayerExternal\Repositories\InPostgres\AlunosRepo;

class ListarAlunosController extends _BaseController
{
    public function execute() {

        try {
            $useCase = new ListarAlunosUseCase(new AlunosRepo());
            $data = $useCase->execute($_GET);
            if (!empty($this->session->getFlashdata())) {
                $data['message'] = $this->session->getFlashdata();
            }
            return view('AlunoViews/index', $data);
        } catch (\Throwable $th) {
            $this->session->setFlashdata('error', $th->getMessage());
            return redirect()->to('/');
        }
    }
}
