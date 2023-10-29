<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddTpAtividades extends Seeder
{
    public function run()
    {
        $data = [
            ['nome' => 'Atividade Complementar', 'curricular' => true, 'limite_hora' => 30],
            ['nome' => 'Atividade Extra Curricular', 'curricular' => false, 'limite_hora' => 10]
        ];

        $this->db->table('tp_atividades')->insertBatch($data);
    }
}
