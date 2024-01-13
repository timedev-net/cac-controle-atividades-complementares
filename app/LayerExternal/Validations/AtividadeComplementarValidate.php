<?php

namespace App\LayerExternal\Validations;

class AtividadeComplementarValidate {
    public static function getRulesValidation() {
        return [
            'nome_atividade' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'O nome da atividade é obrigatório',
                    'min_length' => 'O nome da atividade deve ter no mínimo 3 letras',
                    'max_length' => 'O nome da atividade deve ter no máximo 100 letras',
                ]
            ],
            'aluno_id' => [
                'rules' => 'required',
                'errors' => ['required' => 'O campo é obrigatório']
            ],
            'tp_atividade_id' => [
                'rules' => 'required',
                'errors' => ['required' => 'O campo é obrigatório']
            ],
            'ano_letivo' => [
                'rules' => 'required',
                'errors' => ['required' => 'O campo é obrigatório']
            ],
            'periodo_letivo' => [
                'rules' => 'required',
                'errors' => ['required' => 'O campo é obrigatório']
            ],
            'data_inicio' => [
                'rules' => 'required',
                'errors' => ['required' => 'O campo é obrigatório']
            ],
            'data_conclusao' => [
                'rules' => 'required',
                'errors' => ['required' => 'O campo é obrigatório']
            ],
            'carga_horaria' => [
                'rules' => 'required',
                'errors' => ['required' => 'O campo é obrigatório']
            ],
        ];
    }
    public static function getRulesAnaliseValidation() {
        return [
            'razao_indeferimento' => [
                'rules' => 'required',
                'errors' => ['required' => 'O campo é obrigatório']
            ],
        ];
    }
}