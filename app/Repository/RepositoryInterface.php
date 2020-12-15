<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function getById(int $id);

//    public function getAll();

    public function save($entity): void;

    public function delete($entity): void;
}
