<?php

namespace App\Service;

use App\Models\Customer;

class BasicMatchingAlgorithmService
{
    public function getMatchingScore(Customer $customer1, Customer $customer2): int
    {
        $matchingScore = 0;

        $matchingStrengths = array_intersect(
            $customer1->getAttribute('strengths'),
            $customer1->getAttribute('strengths')
        );
        if (count($matchingStrengths) >= 2) {
            $matchingScore += 30;
        }

        if ($customer1->goal === $customer2->goal) {
            $matchingScore += 25;
        }

        if ($customer1->ideal_partner === $customer2->ideal_partner) {
            $matchingScore += 10;
        }

        if (abs($customer1->age - $customer2->age) <= 5) {
            $matchingScore += 10;
        }

        return $matchingScore;
    }
}
