<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repository\CustomerRepositoryInterface;
use App\Service\StrengthService;

class CustomerController extends Controller
{
    private CustomerRepositoryInterface $customerRepository;
    private StrengthService $strengthService;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        StrengthService $strengthService
    )
    {
        $this->customerRepository = $customerRepository;
        $this->strengthService = $strengthService;
    }

    public function index()
    {
        $customers = $this->customerRepository->getAll();

        $customersData = [];
        foreach ($customers as $customer) {
            $strengths = $this->strengthService->getStrengthsTitlesForCustomer($customer);
            $customer["strengths"] = implode(", ", $strengths);
            $customersData[] = $customer;
        }

        return view("customer.dashboard", ["customers" => $customersData]);
    }

    public function show(Customer $customer)
    {
        var_dump($customer);
//        return view('customer.profile', ['customer' => $customer]);
    }

    public function match()
    {
    }
}
