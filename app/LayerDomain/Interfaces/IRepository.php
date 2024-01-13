<?php
namespace App\LayerDomain\Interfaces;

interface IRepository {
    public function getAll(array $filters): array;
    public function getById(string $id): object;
    public function create(object $object): void;
    public function update(object $object): void;
    // public function remove(string $id): void;
}