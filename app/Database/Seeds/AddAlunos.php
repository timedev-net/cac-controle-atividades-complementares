<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAlunos extends Seeder
{
    public function run()
    {
        $data = [
            ['nome' => 'Daniel de Brito Frota', 'matricula_suap' => '2022206090005', 'email' => 'drfrota.adv@gmail.com'],
            ['nome' => 'Clara Antonella Caldeira', 'matricula_suap' => '457.609.824.598', 'email' => 'clara.antonella.caldeira@gerdau.com.br'],
            ['nome' => 'Igor Joaquim Benício Gonçalves', 'matricula_suap' => '969.793.601.444', 'email' => 'igorjoaquimgoncalves@patrezao.com.br'],
            ['nome' => 'Manuel Bruno Jorge Baptista', 'matricula_suap' => '658.039.100.076', 'email' => 'manuelbrunobaptista@golinelli.eti.br'],
            ['nome' => 'Lorena Eduarda da Rocha', 'matricula_suap' => '707.469.915.265', 'email' => 'lorenaeduardadarocha@sandvik.com'],
            ['nome' => 'Sabrina Elaine Martins', 'matricula_suap' => '420.583.120.896', 'email' => 'sabrina.elaine.martins@andrepires.com.br'],
            ['nome' => 'Tatiane Antônia Natália Silveira', 'matricula_suap' => '780.929.188.656', 'email' => 'tatiane-silveira76@caferibeiro.com.br'],
            ['nome' => 'Yago Henrique Lima', 'matricula_suap' => '335.401.830.006', 'email' => 'yagohenriquelima@portoweb.com.br'],
            ['nome' => 'Tomás Danilo Melo', 'matricula_suap' => '810.042.097.440', 'email' => 'tomas_melo@yahoo.com,br'],
            ['nome' => 'Elisa Elza Pereira', 'matricula_suap' => '793.574.170.010', 'email' => 'los_afael_costa@ficopola.net'],
            ['nome' => 'Antonella Marlene Carla Ferreira', 'matricula_suap' => '253.553.619.514', 'email' => 'carloafae_costa@ficopola.net'],
            ['nome' => 'Kamilly Caroline Melo', 'matricula_suap' => '840.291.839.513', 'email' => 'carlos_ral_cota@ficopola.net'],
            ['nome' => 'Edson Cauã Melo', 'matricula_suap' => '932.921.698.146', 'email' => 'carlos_rafael_costa@ficopola.net'],
            ['nome' => 'Marli Laís', 'matricula_suap' => '753.710.532.680', 'email' => 'carlos_rel_csta@ficopola.net'],
            ['nome' => 'Raul Bryan Giovanni da Luz', 'matricula_suap' => '849.599.525.953', 'email' => 'cos_rfael_costa@ficopola.net'],
            ['nome' => 'Marcos Kaique Márcio da Luz', 'matricula_suap' => '354.148.221.638', 'email' => 'carlos_rafaelsta@icopola.net'],
            ['nome' => 'Isabelle Lavínia', 'matricula_suap' => '860.389.268.723', 'email' => 'carlos_rafacost@ficopola.net'],
            ['nome' => 'Sônia Esther Cláudia', 'matricula_suap' => '651.770.156.568', 'email' => 'carlrafal_costa@ficopola.net'],
            ['nome' => 'Martin Antonio Osvaldo Porto', 'matricula_suap' => '687.390.098.870', 'email' => 'carlosfaelcosta@ficopola.net'],
        ];

        $this->db->table('instituicao.alunos')->insertBatch($data);
    }
}
