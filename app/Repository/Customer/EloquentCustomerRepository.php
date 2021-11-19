<?php

namespace App\Repository;

use App\Models\Customer;
use App\Models\CustomerInterface;

class EloquentCustomerRepository implements CustomerRepositoryInterface
{
    public function getById(int $id): ?CustomerInterface
    {
        return Customer::findOrFail($id);
    }

    /**
     * @return CustomerInterface[]
     */
    public function getUnmatchedCustomers(): array
    {
        return Customer::where("is_matched", false)->get()->all();
    }

    /**
     * @return CustomerInterface[]
     */
    public function getAll(): array
    {
        return Customer::all()->all();
    }

    /**
     * @param CustomerInterface $customer
     */
    public function save($customer): void
    {
        $customer->save();
    }

    /**
     * @param CustomerInterface $customer
     */
    public function delete($customer): void
    {
        $customer->delete();
    }
}
