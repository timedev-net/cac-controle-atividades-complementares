<?php

namespace App\LayerDomain\_Validations;

use App\LayerDomain\_Exceptions\_MaxLetrasException;
use App\LayerDomain\_Exceptions\_MinLetrasException;
use App\LayerDomain\_Exceptions\_ObrigatorioException;

class AtividadeComplementarValidation {
    static public function nome_atividade($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
        if (strlen(trim($value)) < 3) throw new _MinLetrasException(3);
        if (strlen(trim($value)) > 100) throw new _MaxLetrasException(100);
    }
    static public function aluno_id($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
    static public function tp_atividade_id($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
    static public function ano_letivo($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
    static public function periodo_letivo($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
    static public function data_inicio($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
    static public function data_conclusao($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
    static public function carga_horaria($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
    static public function razao_indeferimento($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException('A razão do indeferimento é obrigatório quando não deferir.');
        if (strlen(trim($value)) > 200) throw new _MaxLetrasException(200);
    }
    static public function all(array $data) {
        AtividadeComplementarValidation::nome_atividade($data['nome_atividade']);
        AtividadeComplementarValidation::aluno_id($data['aluno_id']);
        AtividadeComplementarValidation::tp_atividade_id($data['tp_atividade_id']);
        AtividadeComplementarValidation::ano_letivo($data['ano_letivo']);
        AtividadeComplementarValidation::periodo_letivo($data['periodo_letivo']);
        AtividadeComplementarValidation::data_inicio($data['data_inicio']);
        AtividadeComplementarValidation::data_conclusao($data['data_conclusao']);
        AtividadeComplementarValidation::carga_horaria($data['carga_horaria']);
    }
    static public function analise(array $data) {
        if ($data['deferida'] == 'f') AtividadeComplementarValidation::razao_indeferimento($data['razao_indeferimento']);
    }
}