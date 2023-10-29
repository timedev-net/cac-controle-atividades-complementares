<?php

namespace App\Modules\Aluno;

use App\Modules\BaseController;

class AlunoController extends BaseController
{
    public function home()
    {
        return redirect()->to('alunos');
    }
    public function index(): string
    {
        // dd('teste');
        // $teste = new AlunoModel();
        // $teste2 = $teste->getAll();
        // d($teste2);
        return view('Aluno/Views/index');
    }
}
