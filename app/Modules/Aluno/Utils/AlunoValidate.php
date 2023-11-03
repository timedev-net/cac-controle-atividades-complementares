<?php

namespace App\Modules\Aluno\Utils;

class AlunoValidate {
    public static function getRulesValidation($id) {

        $regras_validacao = [
            'nome' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'O Nome do Aluno é obrigatório',
                    'min_length' => 'O Nome do Aluno deve ter no mínimo 3 letras',
                    'max_length' => 'O Nome do Aluno deve ter no máximo 100 letras',
                ]
            ],
            'matricula_suap' => [
                'rules' => empty($id)?'required|min_length[10]|max_length[15]|is_unique[alunos.matricula_suap]':'required|min_length[10]|max_length[15]',
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