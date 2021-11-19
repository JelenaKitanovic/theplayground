<?php

namespace App\Service;

use App\Models\CustomerInterface;

class BruteForceMatchingAlgorithmService implements MatchingAlgorithmServiceInterface
{
    protected const MIN_NUMBER_OF_MATCHING_STRENGTHS = 2;
    protected const MAX_AGE_DIFFERENCE_IN_YEARS = 5;

    protected const MATCHING_STRENGTHS_SCORE = 25;
    protected const MATCHING_GOALS_SCORE = 45;
    protected const MATCHING_IDEAL_PARTNERS_SCORE = 0;
    protected const MATCHING_AGE_SCORE = 15;
    protected const MATCHING_SCORE_0 = 0;

    public function calculateMatchingScore(CustomerInterface $customer1, CustomerInterface $customer2): array
    {
        $data = ["score" => 0];
        $data["strengths"] = false;
        if($this->calculateMatchingScoreForStrengths($customer1->getStrengths(), $customer2->getStrengths()) > 0){
           $data["score"] +=  $this->calculateMatchingScoreForStrengths($customer1->getStrengths(), $customer2->getStrengths());
           $data["strengths"] = true;
        }

        $data["goal"] = false;
        if($this->calculateMatchingScoreForGoals($customer1->getGoal(), $customer2->getGoal()) > 0){
            $data["score"] +=  $this->calculateMatchingScoreForGoals($customer1->getGoal(), $customer2->getGoal());
            $data["goal"] = true;
        }

        $data["idealPartner"] = false;
        if($this->calculateMatchingScoreForIdealPartner($customer1->getIdealPartner(), $customer2->getIdealPartner()) > 0){
            $data["score"] +=  $this->calculateMatchingScoreForIdealPartner($customer1->getIdealPartner(), $customer2->getIdealPartner());
            $data["idealPartner"] = true;
        }

        $data["age"] = false;
        if($this->calculateMatchingScoreForAge($customer1->getAge(), $customer2->getAge()) > 0){
            $data["score"] +=  $this->calculateMatchingScoreForAge($customer1->getAge(), $customer2->getAge());
            $data["age"] = true;
        }

        return $data;
    }

    private function calculateMatchingScoreForStrengths(array $strengths1, array $strengths2): int
    {
        $matchingStrengths = array_intersect($strengths1, $strengths2);
        $matchingStrengthsCount = count($matchingStrengths);
        switch ($matchingStrengthsCount) {
            case 1:
                return 10;
            case 2:
                return 20;
            case 3:
                return 30;
            case 4:
                return 40;
            default:
                return 0;
        }
//        return count($matchingStrengths) >= self::MIN_NUMBER_OF_MATCHING_STRENGTHS
//                ? self::MATCHING_STRENGTHS_SCORE
//                : self::MATCHING_SCORE_0;
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
