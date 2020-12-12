<?php


namespace App\Http\Controllers;

use App\Http\CsvImportRequest;


abstract class ImportCsvController extends Controller
{
    public const PARSE_CSV_STRING_TO_ARRAY = "str_getcsv";

    public function getImport()
    {
        return view('import.form');
    }

    public abstract function parseImport(CsvImportRequest $request);
}
