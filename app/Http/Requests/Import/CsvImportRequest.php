<?php

namespace App\Http;

use Illuminate\Foundation\Http\FormRequest;

class CsvImportRequest extends FormRequest
{
    public const FILE_TYPE_CSV = "csv_file";

    public function rules()
    {
        return [
            self::FILE_TYPE_CSV => "required|file"
        ];
    }
}
