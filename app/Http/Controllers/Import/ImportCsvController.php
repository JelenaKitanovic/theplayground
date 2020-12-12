<?php


namespace App\Http\Controllers;

use App\Http\CsvImportRequest;


abstract class ImportCsvController extends Controller
{
    public function getImport()
    {
        return view('import.form');
    }

    public abstract function parseImport(CsvImportRequest $request);
}
