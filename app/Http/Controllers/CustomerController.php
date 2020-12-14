<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repository\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    private CustomerRepositoryInterface $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->getAll();
        var_dump($customers);
//        return view('customer.dashboard', ['customers' => $customers]);
    }

    public function show(Customer $customer)
    {
        var_dump($customer);
//        return view('customer.profile', ['customer' => $customer]);
    }
}
