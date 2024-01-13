<?php
namespace App\LayerDomain\_Exceptions;

use Exception;

class _EmailValidoException extends Exception {
    public function __construct($message = "O e-mail deve ser válido") {
        parent::__construct($message);
    }
}