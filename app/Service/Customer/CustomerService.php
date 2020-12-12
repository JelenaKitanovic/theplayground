<?php


namespace App\Service;


use App\Factory\CustomerFactoryInterface;
use App\Models\Customer;
use App\Repository\CustomerRepositoryInterface;

class CustomerService implements CustomerServiceInterface
{
    protected CustomerFactoryInterface $customerFactory;
    protected CustomerRepositoryInterface $customerRepository;

    public function __construct(
        CustomerFactoryInterface $customerFactory,
        CustomerRepositoryInterface $customerRepository
    )
    {
        $this->customerFactory = $customerFactory;
        $this->customerRepository = $customerRepository;
    }

    public function addCustomer(
        string $fullName,
        string $email,
        string $goal,
        int $age,
        string $idealPartner,
        ?string $favouriteQuote,
        ?string $favouriteGame,
        ?string $availability
    ): Customer
    {
        $customer = $this->customerFactory->create(
            $fullName,
            $email,
            $goal,
            $age,
            $idealPartner,
            $favouriteQuote,
            $favouriteGame,
            $availability
        );
        $this->customerRepository->save($customer);

        return $customer;
    }
}
