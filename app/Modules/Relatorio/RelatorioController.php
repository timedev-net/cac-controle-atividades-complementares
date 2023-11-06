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
        $model = new RelatorioModel();
        $alunosOk = $model->alunosComTodasAtividadesCurricularesOk();
        foreach ($data['data'] as $e) {
            if (count($filtered = array_filter($alunosOk, fn($a) => $a->aluno_id == $e->id)) > 0) {
                $e->atividades_concluidas = array_map(function($a) {
                    return (object)[
                        'tp_atividade_id' => $a->tp_atividade_id,
                        'nome_atividade' => $a->nome_atividade,
                        'limite_min_horas' => $a->limite_min_horas,
                        'horas_deferidas' => $a->horas_total_by_tp_atividade,
                    ];
                }, $filtered);
            }
        }
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('Relatorio/Views/alunosList', $data);
    }

    public function alunoDetalhes($id)
    {
        $model = new RelatorioModel();
        $data = $model->alunoAllDetalhes($id);
        $data['payload'] = json_decode($_GET['payload']);
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('Relatorio/Views/alunoDetalhes', $data);
    }
}
