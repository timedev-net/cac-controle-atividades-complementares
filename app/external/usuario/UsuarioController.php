<?php

namespace App\External\Usuario;

use App\External\BaseController;

class UsuarioController extends BaseController
{

    public function __construct()
    {
        $repository = new UsuarioRepository();
    }

    public function index(): string
    {
        $teste = $this->repository->getAll();
        d($teste);
        return view('Home/HomeViews/index');
    }
}
