<?php


namespace App\Service;


use App\Factory\CustomerStrengthFactory;
use App\Models\Customer;
use App\Models\Strength;
use App\Repository\CustomerStrengthRepositoryInterface;

class CustomerStrengthService
{
    protected CustomerStrengthFactory $customerStrengthFactory;
    protected CustomerStrengthRepositoryInterface $customerStrengthRepository;

    public function __construct(
        CustomerStrengthRepositoryInterface $customerStrengthRepository,
        CustomerStrengthFactory $customerStrengthFactory
    )
    {
        $this->customerStrengthFactory = $customerStrengthFactory;
        $this->customerStrengthRepository = $customerStrengthRepository;
    }

    public function addCustomerStrength(Customer $customer, Strength $strength)
    {
        $customerStrength = $this->customerStrengthFactory->create($customer, $strength);
        $this->customerStrengthRepository->save($customerStrength);

        return $customerStrength;
    }
}
