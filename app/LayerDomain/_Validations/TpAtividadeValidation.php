<?php

namespace App\LayerDomain\_Validations;

use App\LayerDomain\_Exceptions\_MaxLetrasException;
use App\LayerDomain\_Exceptions\_MinLetrasException;
use App\LayerDomain\_Exceptions\_ObrigatorioException;

class TpAtividadeValidation {
    static public function nome($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
        if (strlen(trim($value)) < 3) throw new _MinLetrasException(3);
        if (strlen(trim($value)) > 100) throw new _MaxLetrasException(100);
    }
    static public function curricular($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
    static public function limite_hora($value) {
        if (strlen(trim($value)) == 0) throw new _ObrigatorioException();
    }
}