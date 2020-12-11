<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function getById(int $id);

    public function getAll();

    public function save($entity);

    public function delete($entity);
}
