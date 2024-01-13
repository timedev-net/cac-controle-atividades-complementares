<?php

namespace App\LayerDomain\Interfaces;

use Exception;

abstract class Repository implements IRepository {

    // abstract public function getAll(array $filters): array;
    // abstract public function getById(string $id): object;
    // abstract public function create(object $object): void;
    // abstract public function update(object $object): void;
    public function remove(string $id): void {
        throw new Exception('método não implementado!');
    }
}