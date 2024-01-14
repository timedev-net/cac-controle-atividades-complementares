<?php

namespace App\LayerExternal\Adapters;

use App\LayerDomain\Interfaces\IUuid;
use Ramsey\Uuid\Uuid;

class UuidAdapter implements IUuid {

    public function generate(): string {
        $uuid = Uuid::uuid4();
        return $uuid->toString();
    }
}
