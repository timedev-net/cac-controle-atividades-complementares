<?php

namespace App\Modules\AtividadeComplementar;

use App\Modules\BaseController;

class AtividadeComplementarController extends BaseController
{
    public function index(): string
    {
        dd('teste');
        // $teste = new AtividadeComplementarModel();
        // $teste2 = $teste->getAll();
        // d($teste2);
        return view('AtividadeComplementar/Views/index');
    }
}
