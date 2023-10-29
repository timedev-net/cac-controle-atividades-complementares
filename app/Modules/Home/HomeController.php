<?php

namespace App\Modules\Home;

use App\Modules\BaseController;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('Home/Views/index');
    }
}
