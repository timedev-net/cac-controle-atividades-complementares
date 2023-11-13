<?php
namespace App\LayerDomain\_Exceptions;

use Exception;

class _MinLetrasException extends Exception {
    public function __construct(int $min = 3, $message = "") {
        $message = "O Campo deve ter no mínimo $min letras";
        parent::__construct($message);
    }
}