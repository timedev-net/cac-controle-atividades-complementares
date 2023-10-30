<?php

namespace App\Modules\Aluno;

use App\Modules\BaseController;

class AlunoController extends BaseController
{
    private $model;
    public function __construct() {
        $this->model = new AlunoModel();
    }
    public function index(): string
    {
        $data = $this->model->getAll($_GET);
        return view('Aluno/Views/index', $data);
    }
    public function showFormCreate(): string
    {
        return view('Aluno/Views/form');
    }
    public function create()
    {
        $this->model->cadastrar($_POST);
        return redirect()->to('/alunos');
    }
    public function showFormEdit($id): string
    {
        dd($id);
        return view('Aluno/Views/form');
    }
    public function update($id): string
    {
        dd($id, $_POST);
        return view('Aluno/Views/index');
    }
    public function delete(): string
    {
        return view('Aluno/Views/index');
    }
}
