<?php

namespace App\LayerInfrastructure\Adapters;

use App\LayerDomain\Interfaces\IUuid;

class UuidAdapter implements IUuid {

    public function generate() {
        // aqui chama a lib que gera o UUID v4
        return "345345";
    }
}