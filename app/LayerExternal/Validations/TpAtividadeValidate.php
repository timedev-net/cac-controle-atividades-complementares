<?php

namespace App\LayerExternal\Validations;

class TpAtividadeValidate {
    public static function getRulesValidation() {

        $regras_validacao = [
            'nome' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'O nome do tipo de tividade é obrigatório',
                    'min_length' => 'O nome do tipo de tividade deve ter no mínimo 3 letras',
                    'max_length' => 'O nome do tipo de tividade deve ter no máximo 100 letras'
                ]
            ],
            'curricular' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'O campo é obrigatório',

                ]
            ],
            'limite_hora' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'O limite de horas é obrigatório',
                ]
            ],
        ];

        return $regras_validacao;
    }
}