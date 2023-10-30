<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAlunos extends Seeder
{
    public function run()
    {
        $data = [
            ['nome' => 'Daniel de Brito Frota', 'matricula_suap' => '2022206090005', 'email' => 'drfrota.adv@gmail.com'],
        ];

        $this->db->table('alunos')->insertBatch($data);
    }
}
