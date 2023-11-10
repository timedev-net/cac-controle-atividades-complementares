<?php
interface IRepository {
    public function getAll(array $filters): array;
    public function getById(string $id): object;
    public function create(object $object): void;
    public function update(object $object): void;
    public function delete(string $id): void;
}