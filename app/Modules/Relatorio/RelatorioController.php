<?php

namespace App\Modules\Relatorio;

use App\Modules\Aluno\AlunoModel;
use App\Modules\AtividadeComplementar\AtividadeComplementarModel;
use App\Modules\BaseController;
use App\Modules\TpAtividade\TpAtividadeModel;

class RelatorioController extends BaseController
{
    public function atividadesList(): string
    {
        $atividadeModel = new AtividadeComplementarModel();
        $data = $atividadeModel->getAll($_GET);
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('Relatorio/Views/atividadesList', $data);
    }

    public function alunosList(): string
    {
        $alunoModel = new AlunoModel();
        $data = $alunoModel->getAll($_GET);
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('Relatorio/Views/alunosList', $data);
    }
}
