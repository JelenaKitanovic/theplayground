<?php

namespace App\Http\Controllers;

use App\Http\CsvImportRequest;
use App\Models\CustomerInterface;
use App\Repository\StrengthRepositoryInterface;
use App\Service\CustomerServiceInterface;
use App\Service\CustomerStrengthService;

class ImportCustomerCsvController extends ImportCsvController
{
    public const DATE_FORMAT_YEAR = "Y";

    protected const CSV_COLUMNS_TO_ATTRIBUTES_MAPPING = [
        CustomerInterface::ATTRIBUTE_FULL_NAME => 1,
        CustomerInterface::ATTRIBUTE_EMAIL => 2,
        CustomerInterface::ATTRIBUTE_AGE => 3,
        CustomerInterface::ATTRIBUTE_GOAL => 28,
        CustomerInterface::ATTRIBUTE_IDEAL_PARTNER => 29,
        CustomerInterface::ATTRIBUTE_AVAILABILITY => 30,
        CustomerInterface::ATTRIBUTE_FAVOURITE_QUOTE => 31,
        CustomerInterface::ATTRIBUTE_FAVOURITE_GAME => 32
    ];
    protected const CSV_CELLS_CUSTOMER_STRENGTHS_INDEX_RANGE = [4, 27];

    protected CustomerServiceInterface $customerService;
    protected StrengthRepositoryInterface $strengthRepository;
    protected CustomerStrengthService $customerStrengthService;

    public function __construct(
        CustomerServiceInterface $customerService,
        StrengthRepositoryInterface $strengthRepository,
        CustomerStrengthService $customerStrengthService
    )
    {
        $this->customerService = $customerService;
        $this->strengthRepository = $strengthRepository;
        $this->customerStrengthService = $customerStrengthService;
    }

    public function parseImport(CsvImportRequest $request): array
    {
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        array_shift($data);

        foreach ($data as $row) {
            $birthYear = $row[self::CSV_COLUMNS_TO_ATTRIBUTES_MAPPING[CustomerInterface::ATTRIBUTE_AGE]];
            $age = !empty($birthYear) && is_numeric($birthYear)
                ? date(self::DATE_FORMAT_YEAR) - $birthYear
                : null;

            $customer = $this->customerService->addCustomer(
                $row[self::CSV_COLUMNS_TO_ATTRIBUTES_MAPPING[CustomerInterface::ATTRIBUTE_FULL_NAME]],
                $row[self::CSV_COLUMNS_TO_ATTRIBUTES_MAPPING[CustomerInterface::ATTRIBUTE_EMAIL]],
                $row[self::CSV_COLUMNS_TO_ATTRIBUTES_MAPPING[CustomerInterface::ATTRIBUTE_GOAL]],
                $age,
                $row[self::CSV_COLUMNS_TO_ATTRIBUTES_MAPPING[CustomerInterface::ATTRIBUTE_IDEAL_PARTNER]],
                $row[self::CSV_COLUMNS_TO_ATTRIBUTES_MAPPING[CustomerInterface::ATTRIBUTE_FAVOURITE_QUOTE]] ?? null,
                $row[self::CSV_COLUMNS_TO_ATTRIBUTES_MAPPING[CustomerInterface::ATTRIBUTE_FAVOURITE_GAME]] ?? null,
                $row[self::CSV_COLUMNS_TO_ATTRIBUTES_MAPPING[CustomerInterface::ATTRIBUTE_AVAILABILITY]] ?? null
            );


            for (
                $i = self::CSV_CELLS_CUSTOMER_STRENGTHS_INDEX_RANGE[0];
                $i <= self::CSV_CELLS_CUSTOMER_STRENGTHS_INDEX_RANGE[1];
                $i++
            ) {
                if ($row[$i] !== "") {
                    $strength = $this->strengthRepository->getByTitle(strtolower($row[$i]));
//                   $customer->strengths()->sync();
                    $this->customerStrengthService->addCustomerStrength($customer, $strength);
                }
            }
        }
    }
}
