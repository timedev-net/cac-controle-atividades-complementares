<?php

namespace App\LayerExternal\Controllers;

use App\LayerExternal\Repositories\InPostgres\AlunosPostgres;
use App\LayerExternal\Repositories\InPostgres\AtividadesComplementaresRepo;
use App\LayerExternal\Repositories\InPostgres\RelatorioRepo;

class RelatorioController extends _BaseController
{
    public function atividadesList(): string
    {
        $atividadeModel = new AtividadesComplementaresRepo();
        $data = $atividadeModel->getAll($_GET);
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('RelatorioViews/atividadesList', $data);
    }

    public function alunosList(): string
    {
        $AlunosPostgres = new AlunosPostgres();
        $data = $AlunosPostgres->getAll($_GET);
        $model = new RelatorioRepo();
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
        return view('RelatorioViews/alunosList', $data);
    }

    public function alunoDetalhes($id)
    {
        $model = new RelatorioRepo();
        $data = $model->alunoAllDetalhes($id);
        $data['payload'] = json_decode($_GET['payload']);
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('RelatorioViews/alunoDetalhes', $data);
    }
}
