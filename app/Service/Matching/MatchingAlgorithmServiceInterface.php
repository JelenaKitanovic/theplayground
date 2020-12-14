<?php

namespace App\Service;

use App\Models\CustomerInterface;

interface MatchingAlgorithmServiceInterface
{
    public function calculateMatchingScore(CustomerInterface $customer1, CustomerInterface $customer2): int;
}
