<?php
namespace App\LayerDomain\_Exceptions;

use Exception;

class _ObrigatorioException extends Exception {
    public function __construct($message = "O campo é obrigatório!") {
        parent::__construct($message);
    }
}