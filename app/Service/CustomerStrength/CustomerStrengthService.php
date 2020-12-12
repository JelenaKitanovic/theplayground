<?php

namespace App\Service;

use App\Factory\CustomerStrengthFactoryInterface;
use App\Models\CustomerInterface;
use App\Models\CustomerStrengthInterface;
use App\Models\StrengthInterface;
use App\Repository\CustomerStrengthRepositoryInterface;

class CustomerStrengthService implements CustomerStrengthServiceInterface
{
    protected CustomerStrengthFactoryInterface $customerStrengthFactory;
    protected CustomerStrengthRepositoryInterface $customerStrengthRepository;

    public function __construct(
        CustomerStrengthRepositoryInterface $customerStrengthRepository,
        CustomerStrengthFactoryInterface $customerStrengthFactory
    )
    {
        $this->customerStrengthFactory = $customerStrengthFactory;
        $this->customerStrengthRepository = $customerStrengthRepository;
    }

    public function addCustomerStrength(
        CustomerInterface $customer,
        StrengthInterface $strength
    ): CustomerStrengthInterface
    {
        $customerStrength = $this->customerStrengthFactory->create($customer, $strength);
        $this->customerStrengthRepository->save($customerStrength);

        return $customerStrength;
    }

    /**
     * @param CustomerInterface $customer
     * @param StrengthInterface[] $strengths
     * @return CustomerStrengthInterface[]
     */
    public function addCustomerStrengthsForCustomer(CustomerInterface $customer, array $strengths): array
    {
        $customerStrengths = [];
        foreach ($strengths as $strength) {
            $customerStrengths[] = $this->addCustomerStrength($customer, $strength);
        }

        return $customerStrengths;
    }
}
