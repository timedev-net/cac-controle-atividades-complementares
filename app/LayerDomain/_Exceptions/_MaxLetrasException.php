<?php
namespace App\LayerDomain\_Exceptions;

use Exception;

class _MaxLetrasException extends Exception {
    public function __construct(int $max = 100, $message = "") {
        $message = "O Campo deve ter no máximo $max letras";
        parent::__construct($message);
    }
}