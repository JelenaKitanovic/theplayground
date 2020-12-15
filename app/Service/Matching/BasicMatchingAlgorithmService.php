<?php

namespace App\Service;

use App\Models\CustomerInterface;

class BasicMatchingAlgorithmService implements MatchingAlgorithmServiceInterface
{
    protected const MIN_NUMBER_OF_MATCHING_STRENGTHS = 2;
    protected const MAX_AGE_DIFFERENCE_IN_YEARS = 5;

    protected const MATCHING_STRENGTHS_SCORE = 30;
    protected const MATCHING_GOALS_SCORE = 25;
    protected const MATCHING_IDEAL_PARTNERS_SCORE = 10;
    protected const MATCHING_AGE_SCORE = 10;
    protected const MATCHING_SCORE_0 = 0;

    public function calculateMatchingScore(CustomerInterface $customer1, CustomerInterface $customer2): int
    {
        return
            $this->calculateMatchingScoreForStrengths(
                $customer1->getStrengths(),
                $customer2->getStrengths()
            )
            + $this->calculateMatchingScoreForGoals(
                $customer1->getGoal(),
                $customer2->getGoal()
            )
            + $this->calculateMatchingScoreForIdealPartner(
                $customer1->getIdealPartner(),
                $customer2->getIdealPartner()
            )
            + $this->calculateMatchingScoreForAge(
                $customer1->getAge(),
                $customer2->getAge()
            );
    }

    private function calculateMatchingScoreForStrengths(array $strengths1, array $strengths2): int
    {
        $matchingStrengths = array_intersect($strengths1, $strengths2);
        return count($matchingStrengths) >= self::MIN_NUMBER_OF_MATCHING_STRENGTHS
                ? self::MATCHING_STRENGTHS_SCORE
                : self::MATCHING_SCORE_0;
    }

    private function calculateMatchingScoreForGoals(string $goal1, string $goal2): int
    {
        return $goal1 === $goal2 ? self::MATCHING_GOALS_SCORE : self::MATCHING_SCORE_0;
    }

    private function calculateMatchingScoreForIdealPartner(string $idealPartner1, string $idealPartner2): int
    {
        return $idealPartner1 === $idealPartner2 ? self::MATCHING_IDEAL_PARTNERS_SCORE : self::MATCHING_SCORE_0;
    }

    private function calculateMatchingScoreForAge(string $age1, string $age2): int
    {
        return abs($age1 - $age2) <= self::MAX_AGE_DIFFERENCE_IN_YEARS
            ? self::MATCHING_AGE_SCORE
            : self::MATCHING_SCORE_0;
    }
}
