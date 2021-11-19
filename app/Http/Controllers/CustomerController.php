<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repository\CustomerRepositoryInterface;
use App\Service\MatchingAlgorithmServiceInterface;
use App\Service\StrengthService;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;
    /**
     * @var StrengthService
     */
    private $strengthService;
    /**
     * @var MatchingAlgorithmServiceInterface
     */
    private $matchingAlgorithmService;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        StrengthService $strengthService,
        MatchingAlgorithmServiceInterface $matchingAlgorithmService
    )
    {
        $this->customerRepository = $customerRepository;
        $this->strengthService = $strengthService;
        $this->matchingAlgorithmService = $matchingAlgorithmService;
    }

    public function index()
    {
        $customers = $this->customerRepository->getAll();

        $customersData = [];
        foreach ($customers as $customer) {
            $strengths = $this->strengthService->getStrengthsTitlesForCustomer($customer);
            $customer["strengths"] = implode(", ", $strengths);
            $customersData[] = $customer;
        }

        return view("customer.dashboard", ["customers" => $customersData]);
    }

    public function show(Customer $customer)
    {
        $strengths = $this->strengthService->getStrengthsTitlesForCustomer($customer);
        $customer["strengths"] = implode(", ", $strengths);
        return view('customer.profile', ['customer' => $customer]);
    }

    public function match(Customer $customer)
    {
        $matchesWithScores = $this->getMatchesWithScoresForCustomer($customer);

        return view("customer.matches_list", ["matchingScores" => $matchesWithScores, "customer" => $customer]);
    }

    public function matchAll()
    {
        $unmatchedCustomers = $this->customerRepository->getUnmatchedCustomers();
        $data = [];
        foreach ($unmatchedCustomers as $customer){
            $strengths = $this->strengthService->getStrengthsTitlesForCustomer($customer);
            $unmatchedCustomerStrengths = implode(", ", $strengths);
            $data[$customer["id"]]["customerStrengths"] = $unmatchedCustomerStrengths;
            $data[$customer["id"]]["customer"] = $customer;
            $data[$customer["id"]]["matchingScores"] = $this->getMatchesWithScoresForCustomer($customer);
        }

        return view("matches", ["data" => $data]);
    }

    private function getMatchesWithScoresForCustomer(Customer $customer): array{
        $unmatchedCustomers = $this->customerRepository->getUnmatchedCustomers();
        $matchingScores = [];
        foreach ($unmatchedCustomers as $unmatchedCustomer) {
            if ($unmatchedCustomer["id"] === $customer->getId()) {
                continue;
            }

            $strengths = $this->strengthService->getStrengthsTitlesForCustomer($unmatchedCustomer);
            $unmatchedCustomerStrengths = implode(", ", $strengths);
            $matchData = $this->matchingAlgorithmService->calculateMatchingScore($customer, $unmatchedCustomer);
            $matchingScores[] = [
                "customerStrengths" => $unmatchedCustomerStrengths,
                "customer" => $unmatchedCustomer->toArray(),
                "score" => $matchData["score"],
                "matchScore" => $matchData
            ];
        }

        //order by score
        $score = array_column($matchingScores, "score");
        array_multisort($score, SORT_DESC, $matchingScores);

        $matchingScores = array_filter($matchingScores, function ($item){
            return $item["score"] > 20;
        });

        return $matchingScores;

    }
}
