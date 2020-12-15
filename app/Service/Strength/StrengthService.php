<?php

namespace App\Service;

use App\Factory\StrengthFactoryInterface;
use App\Models\CustomerInterface;
use App\Models\StrengthInterface;
use App\Repository\StrengthRepositoryInterface;

class StrengthService
{
    protected StrengthRepositoryInterface $strengthRepository;
    protected StrengthFactoryInterface $strengthFactory;

    public function __construct(
        StrengthRepositoryInterface $strengthRepository,
        StrengthFactoryInterface $strengthFactory
    )
    {
        $this->strengthRepository = $strengthRepository;
        $this->strengthFactory = $strengthFactory;
    }

    public function addStrength(string $title): StrengthInterface
    {
        $strength = $this->strengthFactory->create($title);
        $this->strengthRepository->save($strength);

        return $strength;
    }

    /**
     * @param CustomerInterface $customer
     * @return array
     */
    public function getStrengthsTitlesForCustomer(CustomerInterface $customer): array
    {
        $strengthTitles = [];
        foreach ($customer->getStrengths() as $strength) {
            $strengthTitles[] = $strength->getTitle();
        }

        return $strengthTitles;
    }
}
