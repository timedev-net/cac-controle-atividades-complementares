<?php 

namespace App\Modules\TpAtividade\Utils;

class TpAtividadeValidate {
    public static function getRulesValidation() {

        $regras_validacao = [
            'nome' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'O Nome do TpAtividade é obrigatório',
                    'min_length' => 'O Nome do TpAtividade deve ter no mínimo 3 letras',
                    'max_length' => 'O Nome do TpAtividade deve ter no máximo 100 letras',
                ]
            ],
            'matricula_suap' => [
                'rules' => 'required|min_length[10]|max_length[15]|is_unique[TpAtividades.matricula_suap]',
                'errors' => [
                    'required' => 'A matrícula é obrigatória',
                    'min_length' => 'A matrícula deve ter no mínimo 10 números',
                    'max_length' => 'A matrícula deve ter no máximo 15 números',
                    'is_unique' => 'Essa matrícula já foi cadastrada anteriormente, verifique!',
                ]
            ],
            'email' => [
                'rules' => 'required|max_length[45]|valid_email',
                'errors' => [
                    'required' => 'O e-mail é obrigatório',
                    'max_length' => 'O e-mail deve ter no máximo 45 caracteres',
                    'valid_email' => 'O e-mail deve ser válido',
                ]
            ],
        ];

        return $regras_validacao;
    }
}