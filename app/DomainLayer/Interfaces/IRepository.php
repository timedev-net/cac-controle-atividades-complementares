<?php
interface IRepository {
    public function create(object $object);
    public function update(object $object);
    public function delete(object $object);
    public function findById($id);
    public function findByName($name);

}