<?php

namespace App\Modules\TpAtividade;

use App\Modules\BaseController;

class TpAtividadeController extends BaseController
{
    public function index(): string
    {
        // dd('teste');
        $teste = new TpAtividadeModel();
        // $teste2 = $teste->getAll();
        // d($teste2);
        return view('TpAtividade/Views/index');
    }
}
