<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Models\Strength;
use App\Service\BruteForceMatchingAlgorithmService;
use Tests\TestCase;

class BasicMatchingAlgorithmServiceTest extends TestCase
{
    protected const MATCHING_SCORE_0 = 0;
    protected const MATCHING_SCORE_10 = 10;
    protected const MATCHING_SCORE_25 = 25;
    protected const MATCHING_SCORE_30 = 30;
    protected const MATCHING_SCORE_75 = 75;

    /**
     * @var BruteForceMatchingAlgorithmService
     */
    protected $basicMatchingAlgorithmService;

    public function setUp(): void
    {
        parent::setUp();
        $this->basicMatchingAlgorithmService = new BruteForceMatchingAlgorithmService();
    }

    /**
     * @dataProvider dataProviderForCalculateMatchingScore
     * @param int $expectedResult
     * @param Customer $customer1
     * @param Customer $customer2
     */
    public function testCalculateMatchingScore(int $expectedResult, Customer $customer1, Customer $customer2)
    {
        $matchingScore = $this->basicMatchingAlgorithmService->calculateMatchingScore($customer1, $customer2);
        $this->assertEquals($expectedResult, $matchingScore);
    }

    public function dataProviderForCalculateMatchingScore()
    {
        $testDataset = [
            [
                "message" => "Everything matches",
                "matchingScore" => self::MATCHING_SCORE_75,
                "customer1" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_SIDE_PROJECT,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                    Customer::ATTRIBUTE_AGE => 27,
                    "strengths" => [new Strength(), new Strength(["id" => 1])]
                ],
                "customer2" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_SIDE_PROJECT,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                    Customer::ATTRIBUTE_AGE => 25,
                    "strengths" => [new Strength(), new Strength(["id" => 1])]
                ]
            ], [
                "message" => "Only strengths match",
                "matchingScore" => self::MATCHING_SCORE_30,
                "customer1" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_SIDE_PROJECT,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_EFFECTIVE,
                    Customer::ATTRIBUTE_AGE => 35,
                    "strengths" => [new Strength(), new Strength(["id" => 1])]
                ],
                "customer2" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_FIND_A_JOB,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                    Customer::ATTRIBUTE_AGE => 25,
                    "strengths" => [new Strength(), new Strength(["id" => 1])]
                ]
            ], [
                "message" => "Only goals match",
                "matchingScore" => self::MATCHING_SCORE_25,
                "customer1" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_FIND_A_JOB,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_EFFECTIVE,
                    Customer::ATTRIBUTE_AGE => 35,
                    "strengths" => []
                ],
                "customer2" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_FIND_A_JOB,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                    Customer::ATTRIBUTE_AGE => 25,
                    "strengths" => []
                ]
            ], [
                "message" => "Only age matches",
                "matchingScore" => self::MATCHING_SCORE_10,
                "customer1" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_START_A_BUSINESS,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_EFFECTIVE,
                    Customer::ATTRIBUTE_AGE => 35,
                    "strengths" => []
                ],
                "customer2" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_FIND_A_JOB,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                    Customer::ATTRIBUTE_AGE => 30,
                    "strengths" => []
                ]
            ], [
                "message" => "Only ideal partners match",
                "matchingScore" => self::MATCHING_SCORE_10,
                "customer1" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_SIDE_PROJECT,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                    Customer::ATTRIBUTE_AGE => 35,
                    "strengths" => []
                ],
                "customer2" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_FIND_A_JOB,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                    Customer::ATTRIBUTE_AGE => 25,
                    "strengths" => []
                ]
            ], [
                "message" => "Nothing matches",
                "matchingScore" => self::MATCHING_SCORE_0,
                "customer1" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_SIDE_PROJECT,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_EFFECTIVE,
                    Customer::ATTRIBUTE_AGE => 31,
                    "strengths" => []
                ],
                "customer2" => [
                    Customer::ATTRIBUTE_GOAL => Customer::GOAL_TO_FIND_A_JOB,
                    Customer::ATTRIBUTE_IDEAL_PARTNER => Customer::IDEAL_PARTNER_LAID_BACK,
                    Customer::ATTRIBUTE_AGE => 25,
                    "strengths" => []
                ]
            ]
        ];

        foreach ($testDataset as $data) {
            yield $data["message"] => [
                $data["matchingScore"],
                new Customer($data["customer1"]),
                new Customer($data["customer2"])
            ];
        }
    }

}
