<?php

namespace App\Http\Controllers;

use App\Http\CsvImportRequest;
use App\Models\CustomerInterface;
use App\Models\StrengthInterface;
use App\Repository\StrengthRepositoryInterface;
use App\Service\CustomerServiceInterface;
use App\Service\CustomerStrengthServiceInterface;

class ImportCustomerCsvController extends ImportCsvController
{
    public const DATE_FORMAT_YEAR = "Y";

    protected const CSV_COLUMNS_MAPPING = [
        CustomerInterface::ATTRIBUTE_FULL_NAME => 1,
        CustomerInterface::ATTRIBUTE_EMAIL => 2,
        CustomerInterface::ATTRIBUTE_AGE => 3,
        CustomerInterface::ATTRIBUTE_GOAL => 28,
        CustomerInterface::ATTRIBUTE_IDEAL_PARTNER => 29,
        CustomerInterface::ATTRIBUTE_AVAILABILITY => 30,
        CustomerInterface::ATTRIBUTE_FAVOURITE_QUOTE => 31,
        CustomerInterface::ATTRIBUTE_FAVOURITE_GAME => 32
    ];

    protected const CSV_COLUMNS_STRENGTHS_START_INDEX = 4;

    protected CustomerServiceInterface $customerService;
    protected CustomerStrengthServiceInterface $customerStrengthService;
    protected StrengthRepositoryInterface $strengthRepository;

    public function __construct(
        CustomerServiceInterface $customerService,
        CustomerStrengthServiceInterface $customerStrengthService,
        StrengthRepositoryInterface $strengthRepository
    )
    {
        $this->customerService = $customerService;
        $this->customerStrengthService = $customerStrengthService;
        $this->strengthRepository = $strengthRepository;
    }

    public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file(CsvImportRequest::FILE_TYPE_CSV)->getRealPath();
        $csvRows = array_map(self::PARSE_CSV_STRING_TO_ARRAY, file($path));

        //to remove header
        array_shift($csvRows);

        foreach ($csvRows as $row) {

            $birthYear = $row[self::CSV_COLUMNS_MAPPING[CustomerInterface::ATTRIBUTE_AGE]];
            $age = !empty($birthYear) && is_numeric($birthYear)
                ? date(self::DATE_FORMAT_YEAR) - $birthYear
                : null;

            $customer = $this->customerService->addCustomer(
                $row[self::CSV_COLUMNS_MAPPING[CustomerInterface::ATTRIBUTE_FULL_NAME]],
                $row[self::CSV_COLUMNS_MAPPING[CustomerInterface::ATTRIBUTE_EMAIL]],
                $row[self::CSV_COLUMNS_MAPPING[CustomerInterface::ATTRIBUTE_GOAL]],
                $age,
                $row[self::CSV_COLUMNS_MAPPING[CustomerInterface::ATTRIBUTE_IDEAL_PARTNER]],
                utf8_encode($row[self::CSV_COLUMNS_MAPPING[CustomerInterface::ATTRIBUTE_FAVOURITE_QUOTE]]) ?? null,
                utf8_encode($row[self::CSV_COLUMNS_MAPPING[CustomerInterface::ATTRIBUTE_FAVOURITE_GAME]]) ?? null,
                utf8_encode($row[self::CSV_COLUMNS_MAPPING[CustomerInterface::ATTRIBUTE_AVAILABILITY]]) ?? null
            );

            $strengths = $this->getStrengthsFromCsvRow($row);
            $this->customerStrengthService->addCustomerStrengthsForCustomer($customer, $strengths);
        }

        return view("dashboard");
    }

    /**
     * @param array $row
     * @return StrengthInterface[]
     */
    private function getStrengthsFromCsvRow(array $row): array
    {
        $strengthCount = $this->strengthRepository->countAll();
        $strengthColumns = array_slice($row, self::CSV_COLUMNS_STRENGTHS_START_INDEX, $strengthCount);
        $strengthColumns = array_filter($strengthColumns, function ($column) {
            return $column !== "";
        });

        return array_map(function ($title) {
            return $this->strengthRepository->getByTitle(strtolower($title));
        }, $strengthColumns);
    }
}
