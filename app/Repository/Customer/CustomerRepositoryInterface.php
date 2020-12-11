<?php

namespace App\Repository;

use App\Models\CustomerInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function getById(int $id): CustomerInterface;

    //public function getUnmatchedCustomers();
}
