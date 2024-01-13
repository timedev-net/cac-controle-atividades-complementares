<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RunSeeder extends Seeder
{
    public function run()
    {
        // $this->call('AddAlunos');
        // $this->call('AddTpAtividades');
        $this->call('AddAtividadesComplementares');
    }
}
