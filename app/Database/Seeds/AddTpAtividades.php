<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddTpAtividades extends Seeder
{
    public function run()
    {
        $data = [
            // Atividade Curricular
            ['nome' => 'Curso', 'curricular' => true, 'limite_hora' => 30],
            ['nome' => 'Produção científica', 'curricular' => true, 'limite_hora' => 10],
            ['nome' => 'Atividade acadêmica', 'curricular' => true, 'limite_hora' => 60],
            // Atividade Extra Curricular
            ['nome' => 'Voluntariado', 'curricular' => false, 'limite_hora' => 5],
            ['nome' => 'Atividade esportiva', 'curricular' => false, 'limite_hora' => 10],
            ['nome' => 'Cursos de idiomas', 'curricular' => false, 'limite_hora' => 10],
            ['nome' => 'Grupo de teatro ou cinema', 'curricular' => false, 'limite_hora' => 10],
            ['nome' => 'Ações no bairro', 'curricular' => false, 'limite_hora' => 10],
            ['nome' => 'Empresa júnior', 'curricular' => false, 'limite_hora' => 10],
            ['nome' => 'Participação em eventos', 'curricular' => false, 'limite_hora' => 10],
            ['nome' => 'Clube ou grupo de alunos', 'curricular' => false, 'limite_hora' => 10],
        ];

        $this->db->table('atividades.tp_atividades')->insertBatch($data);
    }
}
