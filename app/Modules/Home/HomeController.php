<?php

namespace App\Modules\Home;

use App\Modules\BaseController;
use CodeIgniter\Database\RawSql;

class HomeController extends BaseController
{
    public function index(): string
    {
        // $db = \Config\Database::connect();
        // dd($db->query(new RawSql('CREATE TABLE teste (
        //     brand VARCHAR(255),
        //     model VARCHAR(255),
        //     year INT
        //   )')));
        return view('Home/Views/index');
    }
}
