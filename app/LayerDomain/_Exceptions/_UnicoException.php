<?php
namespace App\LayerDomain\_Exceptions;

use Exception;

class _UnicoException extends Exception {
    public function __construct($message = "Não é permitido cadastrar registro já existente") {
        parent::__construct($message);
    }
}