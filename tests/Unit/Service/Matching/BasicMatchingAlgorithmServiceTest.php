<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Service\BasicMatchingAlgorithmService;
use Tests\TestCase;

class BasicMatchingAlgorithmServiceTest extends TestCase
{
    private BasicMatchingAlgorithmService $basicMatchingAlgorithmService;

    public function setUp(): void
    {
        parent::setUp();
        $this->basicMatchingAlgorithmService = new BasicMatchingAlgorithmService();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_getMatchingScore_withDifferentGoalsPartnerAgeAndStrengths_returns0()
    {
        $customer1 = new Customer(
            [
                Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_FIND_A_JOB,
                Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                Customer::ATTRIBUTE_AGE => 35
            ]
        );
        $customer1->strengths = [30];
        $customer2 = new Customer(
            [
                Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_START_A_BUSINESS,
                Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_EFFECTIVE,
                Customer::ATTRIBUTE_AGE => 25
            ]
        );
        $customer2->strengths = [31];

        $matchingScore = $this->basicMatchingAlgorithmService->getMatchingScore($customer1, $customer2);
        $this->assertEquals(0, $matchingScore);
    }
}
