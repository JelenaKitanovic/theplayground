<?php

namespace App\Repository;

use App\Models\Customer;

class EloquentCustomerRepository implements CustomerRepositoryInterface
{
    public function getById(int $id): Customer
    {
        return Customer::findOrFail($id);
    }

    public function getAll(): array
    {
        return Customer::all()->toArray();
    }

    public function save($customer): void
    {
        $customer->save();
    }

    public function delete($customer): void
    {
        $customer->delete();
    }
}
