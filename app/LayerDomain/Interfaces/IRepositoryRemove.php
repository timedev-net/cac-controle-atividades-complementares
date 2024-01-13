<?php
namespace App\LayerDomain\Interfaces;

interface IRepositoryRemove {

    public function remove(string $id): void;
}