<?php

namespace App\LayerExternal\Controllers;

use CodeIgniter\Database\RawSql;

class HomeController extends _BaseController
{
    public function index(): string
    {
        $data = [];
        if (!empty($this->session->getFlashdata())) {
            $data['message'] = $this->session->getFlashdata();
        }
        return view('HomeViews/index', $data);
    }
}
