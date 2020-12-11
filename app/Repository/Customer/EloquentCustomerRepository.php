<?php

namespace App\Repository;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class EloquentCustomerRepository implements CustomerRepositoryInterface
{
    public function getById(int $id): Customer
    {
        return Customer::findOrFail($id);
    }

    public function getAll(): Collection
    {
        return Customer::all();
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
