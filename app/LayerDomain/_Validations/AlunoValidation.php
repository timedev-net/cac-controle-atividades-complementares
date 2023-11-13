<?php

namespace App\LayerDomain\_Validations;

use App\LayerDomain\_Exceptions\_EmailValidoException;
use App\LayerDomain\_Exceptions\_MaxLetrasException;
use App\LayerDomain\_Exceptions\_MinLetrasException;
use App\LayerDomain\_Exceptions\_ObrigatorioException;

class AlunoValidation {
    static public function nome($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
        if (strlen(trim($value)) < 3) throw new _MinLetrasException(3);
        if (strlen(trim($value)) > 100) throw new _MaxLetrasException(100);
    }
    static public function matriculaSuap($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
        if (strlen(trim($value)) < 10) throw new _MinLetrasException(10);
        if (strlen(trim($value)) > 15) throw new _MaxLetrasException(15);
    }
    static public function email($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) throw new _EmailValidoException();
    }
}